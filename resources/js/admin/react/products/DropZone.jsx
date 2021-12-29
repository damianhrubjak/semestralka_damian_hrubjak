import React from "react";
import PropTypes from "prop-types";

function DropZone(props) {
    return (
        <label
            htmlFor={props.htmlFor}
            className="label-style w-full h-full transition bg-white border-dashed border-2 border-slate-500 p-4 rounded-md outline-none"
        >
            <div className="flex justify-start items-center flex-wrap">
                {props.filesObject?.length > 0 ? (
                    <>
                        <h3 className="font-bold font-secondary">
                            Selected images:
                        </h3>
                        <div className="w-full flex justify-center mt-2 items-center flex-wrap">
                            {Array.from(props.filesObject).map((file, key) => {
                                return (
                                    <div
                                        key={key}
                                        className="w-max py-1 px-3 rounded bg-blue-gray-200 ml-2 first:ml-0 mt-2"
                                    >
                                        <p className="text-sm">{file.name}</p>
                                    </div>
                                );
                            })}
                        </div>
                    </>
                ) : (
                    <p className="font-bold font-secondary">Select image(s)</p>
                )}
            </div>
        </label>
    );
}

DropZone.propTypes = {
    htmlFor: PropTypes.string.isRequired,
    filesObject: PropTypes.object.isRequired,
};

export default DropZone;
