import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";
import PropTypes from "prop-types";
import axios from "axios";
import ProductCategory from "./ProductCategory";
import ProductContext from "./ProductContext";
import Modal from "../Modal";
import { useForm } from "react-hook-form";
import FormError from "../FormError";
import DropZone from "./DropZone";
import Loader from "./Loader";

let deleteProductId = 0;
function Products(props) {
    const [isVisible, setIsVisible] = useState(false);
    const [isLoading, setIsLoading] = useState(false);
    const [isAddModalOpened, setIsAddModalOpened] = useState(false);
    const [isDeleteModalOpened, setIsDeleteModalOpened] = useState(false);
    const [isEditModalOpened, setIsEditModalOpened] = useState(false);
    const [grouppedProducts, setGrouppedPoducts] = useState({});
    const [productCategories, setProductCategories] = useState([]);

    // this is used for adding
    const {
        register,
        watch,
        formState: { errors },
        handleSubmit,
        reset,
    } = useForm({
        mode: "onBlur",
    });

    // this is used for editing
    const {
        register: registerEdit,
        formState: { errors: errorsEdit },
        reset: resetEdit,
        watch: watchEdit,
        handleSubmit: handleSubmitEdit,
    } = useForm({
        mode: "onBlur",
    });

    const fileInputWatcher = watch("images");
    const selectCategoryWatcher = watchEdit("product_category");

    const handleEditProduct = (product) => {
        resetEdit(product);
        setIsEditModalOpened(true);
    };

    const handleDeleteProduct = (product) => {
        deleteProductId = product.id;
        setIsDeleteModalOpened(true);
    };

    const fetchProducts = () => {
        axios
            .get(props.productsFetchUrl)
            .then((res) => {
                if (res.status === 200) {
                    setGrouppedPoducts(res.data.products);
                }
            })
            .catch((err) => {
                console.log(err);
            })
            .finally(() => {
                setIsVisible(true);
            });
    };

    const fetchProductCategories = () => {
        axios
            .get(props.productCategoriesFetchUrl)
            .then((res) => {
                if (res.status === 200) {
                    setProductCategories(res.data);
                }
            })
            .catch((err) => {
                console.log(err);
            });
    };

    const onSubmitAdd = (data) => {
        setIsLoading(true);
        let formdata = new FormData();

        formdata.append("name", data.name);
        formdata.append("condition", data.condition);
        formdata.append("parameters", data.parameters);
        formdata.append("price", data.price);
        formdata.append("description", data.description);
        formdata.append("product_category_id", data.product_category_id);
        Array.from(data.images).forEach((image, key) => {
            formdata.append(`files[${key}]`, image);
        });

        axios
            .post(`${props.productsFetchUrl}`, formdata, {
                headers: {
                    "Content-Type": "multipart/form-data",
                },
            })
            .then((res) => {
                console.log(res);
                if (res.status === 200 && res.data.result === "success") {
                    setIsAddModalOpened(false);
                    setIsVisible(false);
                    setIsLoading(false);
                    reset();
                    // prevent blinking
                    setTimeout(() => {
                        fetchProducts();
                    }, 300);
                }
            })
            .catch((err) => {
                console.log(err);
            });
    };

    const onSubmitEdit = (data) => {
        setIsLoading(true);
        axios
            .put(`${props.productsFetchUrl}/${data.id}`, {
                name: data.name,
                parameters: data.parameters,
                description: data.description,
                condition: data.condition,
                price: data.price,
                product_category_id: data.product_category_id,
            })
            .then((res) => {
                if (res.status === 200 && res.data.result === "success") {
                    setIsEditModalOpened(false);
                    setIsLoading(false);
                    resetEdit();
                    setIsVisible(false);
                    // prevent blinking
                    setTimeout(() => {
                        fetchProducts();
                    }, 300);
                }
            })
            .catch((err) => {
                console.log(err);
            });
    };

    const deleteProduct = () => {
        if (deleteProductId <= 0) {
            return;
        }
        setIsLoading(true);
        axios
            .delete(`${props.productsFetchUrl}/${deleteProductId}`)
            .then((res) => {
                if (res.status === 200 && res.data.result === "success") {
                    deleteProductId = 0;
                    setIsDeleteModalOpened(false);
                    setIsVisible(false);
                    setIsLoading(false);
                    // prevent blinking
                    setTimeout(() => {
                        fetchProducts();
                    }, 300);
                }
            })
            .catch((err) => {
                console.log(err);
            });
    };

    useEffect(() => {
        fetchProducts();
        fetchProductCategories();
        // eslint-disable-next-line react-hooks/exhaustive-deps
    }, []);

    return (
        <>
            <ProductContext.Provider
                value={{
                    triggerEdit: handleEditProduct,
                    triggerDelete: handleDeleteProduct,
                }}
            >
                <div
                    className={`transition duration-700 ${
                        isVisible ? "opacity-100" : "opacity-0"
                    }`}
                >
                    <div className="page-header-with-button">
                        <h1 className="text-4xl font-secondary">Products</h1>
                        <button
                            className={`add-button-in-header`}
                            onClick={() => {
                                setIsAddModalOpened(true);
                            }}
                        >
                            New product
                        </button>
                    </div>

                    <div className="products-wrapper">
                        {Object.keys(grouppedProducts).map(
                            (productCategory) => {
                                return (
                                    <ProductCategory
                                        category={productCategory}
                                        key={productCategory}
                                        products={
                                            grouppedProducts[productCategory]
                                        }
                                    ></ProductCategory>
                                );
                            }
                        )}
                    </div>
                </div>
            </ProductContext.Provider>

            {/* DElete product modal */}
            <Modal
                heading={"Are you sure?"}
                opened={isDeleteModalOpened}
                onModalClose={(state) => {
                    setIsDeleteModalOpened(state);
                }}
                modalContentClassname={`modal-content-message-format`}
            >
                <div className="flex justify-between w-3/4 xs:w-1/2 sm:w-1/3 mx-auto">
                    <button
                        className={`py-2 px-6 rounded-md bg-emerald-400`}
                        onClick={() => {
                            deleteProduct();
                        }}
                        disabled={isLoading}
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
                <Loader isLoading={isLoading} />
            </Modal>

            {/* Edit product Modal */}
            <Modal
                heading={"Editting product"}
                opened={isEditModalOpened}
                onModalClose={(state) => {
                    setIsEditModalOpened(state);
                }}
                className="thin"
            >
                <div className="modal-grid-two-cols">
                    <input
                        type="hidden"
                        {...registerEdit("id", {
                            required: "This field is required",
                            valueAsNumber: true,
                        })}
                    />
                    <div className="input-control flex-col">
                        <input
                            type="text"
                            className="input-style product-style"
                            {...registerEdit("name", {
                                required: "This field is required",
                            })}
                            placeholder={"Product name"}
                        />
                        {errorsEdit.name?.message.length > 0 && (
                            <FormError message={errorsEdit?.name?.message} />
                        )}
                    </div>
                    <div className="input-control flex-col">
                        <input
                            type="text"
                            className="input-style product-style"
                            {...registerEdit("parameters", {
                                required: "This field is required",
                            })}
                            placeholder={"Product parameters"}
                        />
                        {errorsEdit.parameters?.message.length > 0 && (
                            <FormError
                                message={errorsEdit?.parameters?.message}
                            />
                        )}
                    </div>
                    <div className="input-control flex-col">
                        <select
                            {...registerEdit("condition", {
                                required: "This field is required",
                            })}
                            className="input-style product-style"
                            defaultValue={``}
                        >
                            <option value={``} disabled>
                                Choose condition
                            </option>
                            <option value="New">New</option>
                            <option value="Used">Used</option>
                            <option value="Damaged">Damaged</option>
                        </select>
                        {errorsEdit.condition?.message.length > 0 && (
                            <FormError
                                message={errorsEdit?.condition?.message}
                            />
                        )}
                    </div>
                    <div className="input-control flex-col">
                        <input
                            type="number"
                            step={`.01`}
                            className="input-style product-style"
                            {...registerEdit("price", {
                                required: "This field is required",
                            })}
                            placeholder={"Product price [€]"}
                        />
                        {errorsEdit.price?.message.length > 0 && (
                            <FormError message={errorsEdit?.price?.message} />
                        )}
                    </div>
                    <div className="input-control flex-col">
                        <select
                            {...registerEdit("product_category_id", {
                                required: "This field is required",
                            })}
                            className="input-style product-style"
                            defaultValue={
                                selectCategoryWatcher !== undefined
                                    ? selectCategoryWatcher
                                    : ""
                            }
                        >
                            <option value={``} disabled>
                                Choose category
                            </option>
                            {productCategories.map((category) => {
                                return (
                                    <option
                                        key={category.id}
                                        value={category.id}
                                    >
                                        {category.category}
                                    </option>
                                );
                            })}
                        </select>

                        {errorsEdit.product_category_id?.message.length > 0 && (
                            <FormError
                                message={
                                    errorsEdit?.product_category_id?.message
                                }
                            />
                        )}
                    </div>
                </div>
                <div className="input-control flex-col mt-4">
                    <textarea
                        className="input-style product-style h-40"
                        {...registerEdit("description")}
                        placeholder={"Product description"}
                    />
                    {errorsEdit.description?.message.length > 0 && (
                        <FormError message={errorsEdit?.description?.message} />
                    )}
                </div>

                <div className="w-full flex justify-end mt-8 ">
                    <button
                        type="submit"
                        className={`modal-submit-btn edit mx-auto`}
                        onClick={handleSubmitEdit(onSubmitEdit)}
                        disabled={isLoading}
                    >
                        <i className="ri-pencil-fill"></i>
                        <p className="ml-4 text-white">Edit</p>
                    </button>
                </div>
                <Loader isLoading={isLoading} />
            </Modal>

            {/* New product modal */}
            <Modal
                heading={"New product"}
                opened={isAddModalOpened}
                onModalClose={(state) => {
                    setIsAddModalOpened(state);
                }}
                className="thin"
            >
                <div className="modal-grid-two-cols">
                    <div className="input-control flex-col">
                        <input
                            type="text"
                            className="input-style product-style"
                            {...register("name", {
                                required: "This field is required",
                            })}
                            placeholder={"Product name"}
                        />
                        {errors.name?.message.length > 0 && (
                            <FormError message={errors?.name?.message} />
                        )}
                    </div>
                    <div className="input-control flex-col">
                        <input
                            type="text"
                            className="input-style product-style"
                            {...register("parameters", {
                                required: "This field is required",
                            })}
                            placeholder={"Product parameters"}
                        />
                        {errors.parameters?.message.length > 0 && (
                            <FormError message={errors?.parameters?.message} />
                        )}
                    </div>
                    <div className="input-control flex-col">
                        <select
                            {...register("condition", {
                                required: "This field is required",
                            })}
                            className="input-style product-style"
                            defaultValue={``}
                        >
                            <option value={``} disabled>
                                Choose condition
                            </option>
                            <option value="New">New</option>
                            <option value="Used">Used</option>
                            <option value="Damaged">Damaged</option>
                        </select>
                        {errors.condition?.message.length > 0 && (
                            <FormError message={errors?.condition?.message} />
                        )}
                    </div>
                    <div className="input-control flex-col">
                        <input
                            type="number"
                            step={`.01`}
                            className="input-style product-style"
                            {...register("price", {
                                required: "This field is required",
                                valueAsNumber: true,
                            })}
                            placeholder={"Product price [€]"}
                        />
                        {errors.price?.message.length > 0 && (
                            <FormError message={errors?.price?.message} />
                        )}
                    </div>
                    <div className="input-control flex-col">
                        <select
                            {...register("product_category_id", {
                                required: "This field is required",
                                valueAsNumber: true,
                            })}
                            className="input-style product-style"
                            defaultValue={
                                selectCategoryWatcher !== undefined
                                    ? selectCategoryWatcher
                                    : ""
                            }
                        >
                            <option value={``} disabled>
                                Choose category
                            </option>
                            {productCategories.map((category) => {
                                return (
                                    <option
                                        key={category.id}
                                        value={category.id}
                                    >
                                        {category.category}
                                    </option>
                                );
                            })}
                        </select>

                        {errors.product_category_id?.message.length > 0 && (
                            <FormError
                                message={errors?.product_category_id?.message}
                            />
                        )}
                    </div>
                </div>
                <div className="input-control flex-col mt-4">
                    <textarea
                        className="input-style product-style h-40"
                        {...register("description", {
                            required: "This field is required",
                        })}
                        placeholder={"Product description"}
                    />
                    {errors.description?.message.length > 0 && (
                        <FormError message={errors?.description?.message} />
                    )}
                </div>

                <div className="input-control flex-col mt-4 relative  ">
                    <DropZone
                        htmlFor="file-input"
                        filesObject={
                            fileInputWatcher !== undefined
                                ? fileInputWatcher
                                : {}
                        }
                    />
                    <input
                        tabIndex="0"
                        className={`absolute top-0 w-full h-full opacity-0 cursor-pointer`}
                        type={"file"}
                        {...register("images", {
                            required: "This field is required",
                        })}
                        id="file-input"
                        placeholder={"Product images"}
                        multiple={true}
                    />

                    {errors.images?.message.length > 0 && (
                        <FormError message={errors?.images?.message} />
                    )}
                </div>

                <div className="w-full flex justify-end mt-8 ">
                    <button
                        type="submit"
                        className={`modal-submit-btn mx-auto`}
                        onClick={handleSubmit(onSubmitAdd)}
                        disabled={isLoading}
                    >
                        <i className="ri-check-line"></i>
                        <p className="text-white">Add new product</p>
                    </button>
                </div>
                <Loader isLoading={isLoading} />
            </Modal>
        </>
    );
}

Products.propTypes = {
    productsFetchUrl: PropTypes.string.isRequired,
    productCategoriesFetchUrl: PropTypes.string.isRequired,
};

export default Products;

// Mount to HTML
const productsEl = document.querySelector("#products-react-mount");
if (productsEl) {
    ReactDOM.render(
        <Products
            productsFetchUrl={productsEl.dataset.productsFetchUrl}
            productCategoriesFetchUrl={
                productsEl.dataset.productCategoriesFetchUrl
            }
        />,
        productsEl
    );
}
