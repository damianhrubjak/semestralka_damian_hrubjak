import React from "react";
import PropTypes from "prop-types";
import ProductItem from "./ProductItem";
function ProductCategory(props) {
    return (
        <div className="product-category-wrapper">
            <h2 className="product-category-wrapper-heading">
                {props.category}
            </h2>

            <div className="product-category-products-fetch">
                {props.products.map((product) => (
                    <ProductItem product={product} key={product.id} />
                ))}
            </div>
        </div>
    );
}

ProductCategory.propTypes = {
    category: PropTypes.string.isRequired,
    products: PropTypes.array.isRequired,
};

export default ProductCategory;
