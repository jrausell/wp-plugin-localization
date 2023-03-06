
import React from 'react';
import ReactDOM from 'react-dom';
import { useI18n } from '@wordpress/react-i18n';
/**
 * WordPress dependencies
 */
import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';



//Settings page
document.addEventListener('DOMContentLoaded', () => {
   const element = document.getElementById('my-block');
   if (typeof element == 'undefined' || element == null) return;

   ReactDOM.render(<div>{__('Hello world', 'my-block')}</div>, element);
})


// Register the block
registerBlockType('my-block/local', {
   title: __('My Block Local', 'my-block'),
   edit: function () {
      return <p> {__('Hello world', 'my-block')} (from the editor)</p>;
   },
   save: function () {
      return <p> {__('Hello world', 'my-block')} (from the frontend) </p>;
   },
});