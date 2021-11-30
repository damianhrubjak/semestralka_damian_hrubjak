import React from "react";
import PropTypes from "prop-types";

function FormError(props) {
    return (
        <div className="mt-2 w-full py-1 px-2 bg-rose-600 rounded-md ">
            <p className="text-white">{props.message}</p>
        </div>
    );
}

FormError.propTypes = {
    message: PropTypes.string.isRequired,
};

export default FormError;
