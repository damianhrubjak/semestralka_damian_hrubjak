import React from "react";
import PropTypes from "prop-types";

function Loader(props) {
    return (
        <div
            className={`w-full flex justify-end transition-all duration-300 overflow-hidden ${
                props.isLoading
                    ? "mt-4 opacity-100 max-h-[4rem]"
                    : "max-h-0 opacity-0"
            } `}
        >
            <div className="w-8 h-8 text-3xl animate-spin flex justify-center items-center text-blue-gray-800">
                <i className="ri-loader-4-line"></i>
            </div>
        </div>
    );
}

Loader.propTypes = {
    isLoading: PropTypes.bool.isRequired,
};

export default Loader;
