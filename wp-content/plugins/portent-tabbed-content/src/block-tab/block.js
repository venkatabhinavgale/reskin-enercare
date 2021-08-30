/**
 * BLOCK: portent-tabbed-content
 *
 * Registering a basic block with Gutenberg.
 * Simple block, renders and saves the same content without any interactivity.
 */

//  Import CSS.
import './editor.scss';
import './style.scss';

const { __ } = wp.i18n; // Import __() from wp.i18n
const { registerBlockType } = wp.blocks; // Import registerBlockType() from wp.blocks
import { InnerBlocks, useBlockProps, InspectorControls, MediaUpload, MediaUploadCheck } from '@wordpress/block-editor';
import { TextControl, Button, Panel, PanelBody, PanelRow, Spinner } from '@wordpress/components';
const ALLOWED_MEDIA_TYPES = [ 'image' ];

/**
 * Register: aa Gutenberg Block.
 *
 * Registers a new block provided a unique name and an object defining its
 * behavior. Once registered, the block is made editor as an option to any
 * editor interface where blocks are implemented.
 *
 * @link https://wordpress.org/gutenberg/handbook/block-api/
 * @param  {string}   name     Block name.
 * @param  {Object}   settings Block settings.
 * @return {?WPBlock}          The block, if it has been successfully
 *                             registered; otherwise `undefined`.
 */
registerBlockType( 'portent/block-tabbed-content--tab', {
	// Block name. Block names must be string that contains a namespace prefix. Example: my-plugin/my-custom-block.
	title: __( 'Tab' ), // Block title.
	description: __( 'Inner child block type for tabbed content.' ),
	parent: [ 'portent/block-tabbed-content' ],
	icon: 'tablet', // Block icon from Dashicons → https://developer.wordpress.org/resource/dashicons/.
	category: 'common', // Block category — Group blocks together based on common traits E.g. common, formatting, layout widgets, embed.
	keywords: [
		__( 'Portent' ),
		__( 'Enercare' ),
		__( 'Tab' ),
	],
	attributes: {
		title: {
			type: 'string'
		},
		iconid : {
			type: 'string',
		},
		tabid: {
			type: 'string'
		}
	},

	/**
	 * The edit function describes the structure of your block in the context of the editor.
	 * This represents what the editor will render when the block is used.
	 *
	 * The "edit" property must be a valid function.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
	 *
	 * @param {Object} props Props.
	 * @returns {Mixed} JSX Component.
	 */
	edit: ( props) => {
		const { attributes:{ title, iconid, tabid }, setAttributes} = props;
		props.setAttributes({tabid: props.clientId})
		const blockProps = useBlockProps();

		const onUpdateImage = ( image ) => {
			setAttributes( {
				iconid: image.url,
			} );
		};

		const onRemoveImage = () => {
			setAttributes( {
				iconid: undefined,
			} );
		};

		return (
			<div className="block-tabbed-content__panel" data-tab={props.attributes.tabid} data-interface="tab-panel">
				<InspectorControls key="setting">
					<div id="tab-controls">
						<Panel header="">
							<PanelBody title="Tab Settings" initialOpen={ true }>
								<PanelRow>
									<TextControl
										label = { __( 'Tab Title', 'portent-tabbed-content' ) }
										help = { __('Tab title will be used to populate tab switching button names', 'portent-tabbed-content' ) }
										value = { title }
										onChange = { title => setAttributes( {title} ) }
										/>
								</PanelRow>
								<PanelRow>
									<label className="portent-tabbed-content__tab-icon-label">Tab Icon</label>
									<MediaUploadCheck>
										<MediaUpload
											title={ __( 'Tab Icon', 'portent-tabbed-content' ) }
											onSelect={ onUpdateImage }
											allowedTypes={ ALLOWED_MEDIA_TYPES }
											value={ props.attributes.iconid }
											render={ ( { open } ) => (
												<Button
													className={ __('portent-tabbed-content__tab-icon-label', 'portent-tabbed-content')}
													onClick={ open }>
													{ ! iconid && ( __( 'Set Tab Icon', 'portent-tabbed-content' ) ) }
													{ !! iconid &&
														<img width="90" height="90" src={ iconid } alt={ __( 'Tab Icon', 'portent-tabbed-content' ) } />
													}
												</Button>
											) }
										/>
									</MediaUploadCheck>
									{ !! iconid &&
									<MediaUploadCheck>
										<Button onClick={ onRemoveImage } isLink isDestructive>
											{ __( 'Remove Tab Icon', 'image-selector-example' ) }
										</Button>
									</MediaUploadCheck>
									}
								</PanelRow>
							</PanelBody>
						</Panel>
					</div>
				</InspectorControls>
					<h3 className={"block-tabbed-content__tab__title"}>{props.attributes.title}</h3>
					<InnerBlocks orientation="horizontal"/>
			</div>
		);
	},

	/**
	 * The save function defines the way in which the different attributes should be combined
	 * into the final markup, which is then serialized by Gutenberg into post_content.
	 *
	 * The "save" property must be specified and must be a valid function.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
	 *
	 * @param {Object} props Props.
	 * @returns {Mixed} JSX Frontend HTML.
	 */
	save: ( props ) => {
		const blockProps = useBlockProps.save();
		return (
			<div className={"block-tabbed-content__panel"}>
				<h3 className={"block-tabbed-content__tab__title"} data-tab={props.attributes.tabid}>{props.attributes.title}</h3>
				<div { ...blockProps } data-tab={props.attributes.tabid}>
					<InnerBlocks.Content />
				</div>
			</div>
		);
	},
} );
