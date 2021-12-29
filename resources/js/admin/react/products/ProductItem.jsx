import React, { useContext } from "react";
import PropTypes from "prop-types";
import ProductContext from "./ProductContext";
function ProductItem(props) {
    const productContext = useContext(ProductContext);

    return (
        <div className="product-item">
            <div className="image">
                <img
                    src={
                        location.origin +
                        "/thumbnail-image/" +
                        props.product?.image?.id
                    }
                    alt={`Image for ${props.product?.name}`}
                />
            </div>
            <div className="text">
                <a className="product-item-name">{props.product?.name}</a>
                <div className="product-item-text-group">
                    <p className="group-name">Parameters:</p>
                    <p className="group-content">{props.product?.parameters}</p>
                </div>
                <div className="product-item-text-group">
                    <p className="group-name">Condition:</p>
                    <p className="group-content">{props.product?.condition}</p>
                </div>
                <div className="product-item-text-group">
                    <p className="group-name">Price:</p>
                    <p className="group-content">{`${props.product?.price}€`}</p>
                </div>
                <div className="actions">
                    <button
                        className="action-button hover:bg-amber-600"
                        onClick={() => {
                            productContext.triggerEdit(props.product);
                        }}
                    >
                        <i className="ri-pencil-line"></i>
                    </button>
                    <button
                        className="action-button hover:bg-rose-600"
                        onClick={() => {
                            productContext.triggerDelete(props.product);
                        }}
                    >
                        <i className="ri-delete-bin-2-line"></i>
                    </button>
                </div>
            </div>
        </div>
    );
}

ProductItem.propTypes = {
    product: PropTypes.object.isRequired,
};

export default ProductItem;
