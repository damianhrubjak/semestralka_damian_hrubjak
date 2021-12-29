import React, { useState, useEffect, useCallback } from "react";
import PropTypes from "prop-types";
import { lock, unlock, clearBodyLocks } from "tua-body-scroll-lock";

export default function Modal(props) {
    const modalWrapper = React.useRef(null);
    const [modalState, setModalState] = useState(false);
    const [visibleState, setVisibleState] = useState(false);
    const [openAnimationState, setOpenAnimationState] = useState(false);
    const [contentVisibleState, setContentVisibleState] = useState(false);

    useEffect(() => {
        if (props.opened !== modalState) {
            setModalState(props.opened);
        }
        //? there is lint disabled, because, when modalState changes, the modalState will be set to default value
        //? we want open/close modal, only when props changes
        // eslint-disable-next-line react-hooks/exhaustive-deps
    }, [props.opened]);

    //it must be in useEffect, to prevent function, to be called multiple times
    useEffect(() => {
        let timeouts = [];
        //according to the state, open or close modal
        timeouts = modalState ? openModal() : closeModal();
        //clear timeout => cleanup
        return () => {
            timeouts.map((timeout) => {
                clearTimeout(timeout);
            });
        };
    }, [closeModal, modalState, openModal]);

    const openModal = useCallback(() => {
        let timeout1, timeout2;

        //add class visible
        setVisibleState(true);

        //add class open-animation
        timeout1 = setTimeout(() => {
            lock(modalWrapper.current);
            setOpenAnimationState(true);
        }, 50);
        //add class content-visible
        timeout2 = setTimeout(() => {
            setContentVisibleState(true);
            props.onModalOpen(modalState);
        }, 50 + props.modalOpenDuration + props.pauseBetweenAnimations);
        return [timeout1, timeout2];
    }, [modalState, props]);

    const closeModal = useCallback(() => {
        let timeout1, timeout2;

        //remove class content-visible
        setContentVisibleState(false);

        //remove class open-animation
        timeout1 = setTimeout(() => {
            unlock(modalWrapper.current, {
                reserveScrollBarGap: true,
            });
            setOpenAnimationState(false);
        }, props.modalContentOpenDuration + props.pauseBetweenAnimations);

        //class visible -> display none => hide modal
        timeout2 = setTimeout(() => {
            setVisibleState(false);
            //after modal is hidden, unmount it from html
            props.onModalClose(modalState);
            unmountModal();
        }, props.modalOpenDuration + props.modalContentOpenDuration + props.pauseBetweenAnimations);
        return [timeout1, timeout2];
    }, [modalState, props, unmountModal]);

    const unmountModal = useCallback(() => {
        clearBodyLocks();
    }, []);

    return (
        <div
            ref={modalWrapper}
            className={`modal-wrapper ${visibleState ? "visible" : ""} ${
                openAnimationState ? "open-animation" : ""
            } ${contentVisibleState ? "content-visible" : ""} ${
                props.className
            }`}
            onClick={(e) => {
                if (e.target === modalWrapper.current) {
                    setModalState(false);
                }
            }}
        >
            <div className={`modal-content ${props.modalContentClassname}`}>
                <div className="modal-header">
                    <h2 className="text-blue-gray-800 text-3xl font-medium font-secondary">
                        {props.heading}
                    </h2>
                    <button
                        className={`text-3xl`}
                        onClick={() => {
                            setModalState(false);
                        }}
                    >
                        <i className="ri-close-fill pointer-events-none"></i>
                    </button>
                </div>
                <div className="modal-body mt-8">{props.children}</div>
            </div>
        </div>
    );
}

Modal.propTypes = {
    heading: PropTypes.node.isRequired,
    children: PropTypes.oneOfType([
        PropTypes.arrayOf(PropTypes.node),
        PropTypes.node,
    ]).isRequired,
    opened: PropTypes.bool.isRequired,
    modalOpenDuration: PropTypes.number.isRequired,
    modalContentOpenDuration: PropTypes.number.isRequired,
    pauseBetweenAnimations: PropTypes.number.isRequired,
    onModalOpen: PropTypes.func,
    onModalClose: PropTypes.func,
    className: PropTypes.string,
    parentPath: PropTypes.string,
    modalContentClassname: PropTypes.string,
};

Modal.defaultProps = {
    onModalOpen: () => {},
    onModalClose: () => {},
    className: "",
    modalOpenDuration: 300,
    modalContentOpenDuration: 300,
    pauseBetweenAnimations: 200,
    modalContentClassname: "",
    string: "",
};
Modal.whyDidYouRender = true;
