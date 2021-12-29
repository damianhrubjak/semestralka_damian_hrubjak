import React from "react";

const ProductContext = React.createContext({
    triggerEdit: () => {},
    triggerDelete: () => {},
});

export default ProductContext;
