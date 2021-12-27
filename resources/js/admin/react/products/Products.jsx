import React from "react";
import ReactDOM from "react-dom";
import PropTypes from "prop-types";

function Products(props) {
    return <div></div>;
}

Products.propTypes = {};

export default Products;

// Mount to HTML
const productsEl = document.querySelector("#products-react-mount");
if (productsEl) {
    ReactDOM.render(
        <Products fetchUrl={productsEl.dataset.fetchUrl} />,
        productsEl
    );
}
