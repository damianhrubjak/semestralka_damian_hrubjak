import React, { useState, useEffect } from "react";
import PropTypes from "prop-types";
import axios from "axios";
import { useForm } from "react-hook-form";

function ProductCategoryItem(props) {
    const [isDisabled, setIsDisabled] = useState(true);

    const { register, handleSubmit, setFocus } = useForm({
        mode: "onBlur",
        defaultValues: {
            category: props.productCategory.category,
        },
    });

    useEffect(() => {
        if (!isDisabled) {
            setFocus("category");
        }
        // eslint-disable-next-line react-hooks/exhaustive-deps
    }, [isDisabled]);

    const onSubmit = (data) => {
        if (data.category === props.productCategory.category) {
            setIsDisabled(true);
            return;
        }
        axios
            .put(`${props.fetchUrl}/${props.productCategory.id}`, {
                category: data.category,
            })
            .then((res) => {
                if (res.status === 200) setIsDisabled(true);
            })
            .catch((err) => {
                console.log(err?.response);
            });
    };

    return (
        <div className="product-category-item flex items-stretch justify-between">
            <div className="input-control flex items-center ml-4 ">
                <input
                    type="text"
                    className="input-style-disabled rounded-r-none"
                    disabled={isDisabled}
                    {...register("category", {
                        required: "This field is required",
                    })}
                />
                <button
                    type="submit"
                    className={`transtion duration-300 text-xl self-stretch h-[36px] py-1 px-3 my-auto rounded-r-md bg-emerald-600 text-white ${
                        isDisabled
                            ? "opacity-0 invisible"
                            : "opacity-100 visible"
                    }`}
                    onClick={handleSubmit(onSubmit)}
                >
                    <i className="ri-check-line"></i>
                </button>
            </div>
            <div className="actions p-3 bg-blue-gray-700 rounded-lg text-white flex items-center">
                <button
                    onClick={() => {
                        setIsDisabled(!isDisabled);
                    }}
                    className="product-category-item-button hover:text-orange-400"
                >
                    {isDisabled ? (
                        <i className="ri-pencil-line"></i>
                    ) : (
                        <i className="ri-close-circle-line"></i>
                    )}
                </button>
                <button
                    className="product-category-item-button hover:text-rose-600 ml-4"
                    onClick={() => {
                        props.onDelete(props.productCategory.id);
                    }}
                >
                    <i className="ri-delete-bin-line"></i>
                </button>
            </div>
        </div>
    );
}

ProductCategoryItem.propTypes = {
    productCategory: PropTypes.object.isRequired,
    fetchUrl: PropTypes.string.isRequired,
    onDelete: PropTypes.func.isRequired,
};

export default ProductCategoryItem;
