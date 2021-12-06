/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-i18n/
 */
import { __ } from "@wordpress/i18n";

import { InnerBlocks, RichText } from "@wordpress/block-editor";

/**
 * The save function defines the way in which the different attributes should
 * be combined into the final markup, which is then serialized by the block
 * editor into `post_content`.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-edit-save/#save
 *
 * @return {WPElement} Element to render.
 */
export default function save({ attributes }) {
	const { accordionTitle, accordionID, tagName } = attributes;

	return (
		<div className="bbuilds-accordion" id="bbuilds-accordion">
			<button
				aria-expanded="false"
				aria-controls={`accordion-panel-${accordionID}`}
				id={`accordion-header-${accordionID}`}
				className="bbuilds-accordion__toggle has-background transparent has-text-color"
			>
				<RichText.Content tagName={tagName} value={accordionTitle} />
			</button>
			<div
				id={`accordion-panel-${accordionID}`}
				className="bbuilds-accordion__content is-collapsed"
				aria-hidden="true"
				role="region"
				aria-labelledby={`accordion-header-${accordionID}`}
			>
				<InnerBlocks.Content />
			</div>
		</div>
	);
}
