import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";
import PropTypes from "prop-types";
import axios from "axios";
import ProductCategoryItem from "./ProductCategoryItem";
import Modal from "./Modal";
import { useForm } from "react-hook-form";

let deleteId = 0;

function ProductCategories(props) {
    const [productCategories, setProductCategories] = useState([]);
    const [isDeleteModalOpened, setIsDeleteModalOpened] = useState(false);
    const [isAddModalOpened, setIsAddModalOpened] = useState(false);
    const [isMounted, setIsMounted] = useState(false);

    const { register, handleSubmit, setFocus } = useForm({
        mode: "onBlur",
    });

    useEffect(() => {
        fetchCategories();
        // eslint-disable-next-line react-hooks/exhaustive-deps
    }, []);

    const fetchCategories = () => {
        setIsMounted(false);
        setTimeout(() => {
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
        }, 300);
    };

    const onSubmit = (data) => {
        axios
            .post(`${props.fetchUrl}`, { category: data.category })
            .then((res) => {
                if (res.status === 200) fetchCategories(true);
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
                if (res.status === 200) fetchCategories(true);
            })
            .catch((err) => {
                console.log(err?.response);
            });
    };

    return (
        <div
            className={`${
                isMounted ? "opacity-100" : "opacity-0"
            } transition duration-700`}
        >
            <div className="flex justify-between">
                <h1 className="text-4xl font-secondary">Product Categories</h1>
                <button
                    className={`rounded-md border-2 border-blue-gray-700 px-6 py-3 transition duration-300 font-secondary font-bold hover:bg-blue-gray-700 hover:text-white`}
                    onClick={() => {
                        setIsAddModalOpened(true);
                        setFocus("category");
                    }}
                >
                    New category
                </button>
            </div>
            <div className="grid grid-cols-3 gap-4 mt-8">
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
                modalContentClassname={`w-full md:w-[600px]`}
            >
                <div className="flex justify-between w-1/3 mx-auto">
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
                modalContentClassname={`w-full md:w-[600px]`}
            >
                <div className="w-full mx-auto flex justify-between items-center">
                    <div className="input-control flex items-center w-[calc(100%-172px)]">
                        <input
                            type="text"
                            className="input-style border-2 border-blue-gray-600 text-lg"
                            {...register("category", {
                                required: "This field is required",
                            })}
                            placeholder={"New category"}
                        />
                    </div>
                    <button
                        type="submit"
                        className={`transtion duration-300 text-xl py-2 px-6 mx-auto rounded-md bg-emerald-600 text-white flex items-center ml-4 self-stretch`}
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
ReactDOM.render(
    <ProductCategories fetchUrl={productCategoriesEl.dataset.fetchUrl} />,
    productCategoriesEl
);
