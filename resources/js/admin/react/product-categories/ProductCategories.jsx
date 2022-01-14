import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";
import PropTypes from "prop-types";
import axios from "axios";
import ProductCategoryItem from "./ProductCategoryItem";
import Modal from "../Modal";
import { useForm } from "react-hook-form";
import FormError from "../FormError";

let deleteId = 0;

function ProductCategories(props) {
    const [productCategories, setProductCategories] = useState([]);
    const [isDeleteModalOpened, setIsDeleteModalOpened] = useState(false);
    const [isAddModalOpened, setIsAddModalOpened] = useState(false);
    const [isMounted, setIsMounted] = useState(false);

    const {
        register,
        formState: { errors },
        handleSubmit,
        setFocus,
    } = useForm({
        mode: "onBlur",
    });

    useEffect(() => {
        fetchCategoriesWithAnimation(true);
        // eslint-disable-next-line react-hooks/exhaustive-deps
    }, []);

    const fetchCategoriesWithAnimation = (initialLoad = false) => {
        if (!initialLoad) {
            setIsMounted(false);
            setTimeout(() => {
                fetchCategories();
            }, 500);
        } else {
            fetchCategories();
        }
    };

    const fetchCategories = () => {
        axios
            .get(props.fetchUrl)
            .then((res) => {
                if (res.status === 200) {
                    setProductCategories(res.data);
                }
            })
            .catch((err) => {
                console.log(err);
            })
            .finally(() => {
                setIsMounted(true);
            });
    };

    const onSubmit = (data) => {
        axios
            .post(`${props.fetchUrl}`, { category: data.category })
            .then((res) => {
                if (res.status === 200) fetchCategoriesWithAnimation();
            })
            .catch((err) => {
                console.log(err?.response);
            })
            .finally(() => {
                setIsAddModalOpened(false);
            });
    };

    const onDelete = (id) => {
        axios
            .delete(`${props.fetchUrl}/${id}`)
            .then((res) => {
                if (res.status === 200) fetchCategoriesWithAnimation();
            })
            .catch((err) => {
                console.log(err?.response);
            });
    };

    return (
        <div
            className={`${
                isMounted ? "opacity-100" : "opacity-0"
            } transition duration-500`}
        >
            <div className="page-header-with-button">
                <h1 className="text-4xl font-secondary">Product Categories</h1>
                <button
                    className={`add-button-in-header`}
                    onClick={() => {
                        setIsAddModalOpened(true);
                        setFocus("category");
                    }}
                >
                    New category
                </button>
            </div>
            <div className="product-categories-grid">
                {productCategories.map((productCategory) => {
                    return (
                        <ProductCategoryItem
                            productCategory={productCategory}
                            fetchUrl={props.fetchUrl}
                            key={productCategory.id}
                            onDelete={(id) => {
                                deleteId = id;
                                setIsDeleteModalOpened(true);
                            }}
                        />
                    );
                })}
            </div>
            <Modal
                heading={"Are you sure?"}
                opened={isDeleteModalOpened}
                onModalClose={(state) => {
                    deleteId = null;
                    setIsDeleteModalOpened(state);
                }}
                modalContentClassname={`modal-content-message-format`}
            >
                <div className="flex justify-between w-3/4 xs:w-1/2 sm:w-1/3 mx-auto">
                    <button
                        className={`py-2 px-6 rounded-md bg-emerald-400`}
                        onClick={() => {
                            if (deleteId != null && deleteId !== 0) {
                                setIsDeleteModalOpened(false);
                                onDelete(deleteId);
                                deleteId = null;
                            }
                        }}
                    >
                        Yes
                    </button>
                    <button
                        className={`py-2 px-6 rounded-md bg-rose-400`}
                        onClick={() => {
                            setIsDeleteModalOpened(false);
                        }}
                    >
                        No
                    </button>
                </div>
            </Modal>
            <Modal
                heading={"New product category"}
                opened={isAddModalOpened}
                onModalClose={(state) => {
                    setIsAddModalOpened(state);
                }}
                modalContentClassname={`modal-content-message-format`}
            >
                <div className="add-product-category-container">
                    <div className="input-control flex flex-col items-center w-full xs:w-[calc(100%-172px)]">
                        <input
                            type="text"
                            className="input-style border-2 border-blue-gray-600 text-lg"
                            {...register("category", {
                                required: "This field is required",
                            })}
                            placeholder={"New category"}
                        />
                        {errors.category?.message.length > 0 && (
                            <FormError message={errors?.category?.message} />
                        )}
                    </div>
                    <button
                        type="submit"
                        className={`modal-submit-btn self-stretch mt-4 xs:mt-0 mx-auto xs:ml-4`}
                        onClick={handleSubmit(onSubmit)}
                    >
                        <i className="ri-check-line"></i>
                        <p className="text-white">Add new</p>
                    </button>
                </div>
            </Modal>
        </div>
    );
}

ProductCategories.propTypes = {
    fetchUrl: PropTypes.string.isRequired,
};

export default ProductCategories;

// Mount to HTML
const productCategoriesEl = document.querySelector(
    "#product-categories-react-mount"
);
if (productCategoriesEl) {
    ReactDOM.render(
        <ProductCategories fetchUrl={productCategoriesEl.dataset.fetchUrl} />,
        productCategoriesEl
    );
}
