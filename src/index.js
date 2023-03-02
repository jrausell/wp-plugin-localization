/**
 * WordPress dependencies
 */
import { registerBlockType } from '@wordpress/blocks';
import { __ } from '@wordpress/i18n';

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