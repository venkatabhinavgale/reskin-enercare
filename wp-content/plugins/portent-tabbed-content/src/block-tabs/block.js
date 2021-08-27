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
const ALLOWED_BLOCKS = [ 'portent/block-portent-tabbed-content--tab' ];
import { InnerBlocks, useBlockProps } from '@wordpress/block-editor';
const { withSelect } = wp.data;

//import TabSelect from "./components/tabSelect";

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
registerBlockType( 'portent/block-tabbed-content', {
	// Block name. Block names must be string that contains a namespace prefix. Example: my-plugin/my-custom-block.
	title: __( 'Tabbed Content' ), // Block title.
	description: __( 'This block allows for a tabbed content area to be setup' ),
	icon: 'table-row-after', // Block icon from Dashicons → https://developer.wordpress.org/resource/dashicons/.
	category: 'design', // Block category — Group blocks together based on common traits E.g. common, formatting, layout widgets, embed.
	keywords: [
		__( 'Tabbed Content' ),
		__( 'Portent' ),
		__( 'Tabs' ),
	],
	attributes: {
		tabs: {
			type: 'string',
			default: null
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
	edit: withSelect( ( select, blockData ) => {
		return {
			innerBlocks: select( 'core/block-editor' ).getBlocks( blockData.clientId )
		};
	} )( ( { innerBlocks, className, attributes, setAttributes } ) => {
		const tabsArray = innerBlocks.map( tab => [tab.clientId,tab.attributes.title] );
		const serialTabs = JSON.stringify(tabsArray);
		if( attributes.tabs !== serialTabs ) {
			setAttributes({tabs:serialTabs});
			console.log(attributes.tabs);
		}
		const TabsList = () => (
			<div class="block-tabbed-content__tabs">
				{innerBlocks.map(tab => <button class="block-tabbed-content__tab" data-tab={tab.clientId}><img width="20px" height="20px" alt="" src=""/>{tab.attributes.title}</button>)}
			</div>
		);
	return <div className={className}>
		<TabsList/>
		<InnerBlocks allowedBlocks={ALLOWED_BLOCKS}/>
	</div>
} ),

	/**
	 * The sve function defines the way in which the different attributes should be combined
	 * into the final markup, which is then serialized by Gutenberg into post_content.
	 *
	 * The "save" property must be specified and must be a valid function.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
	 *
	 * @param {Object} props Props.
	 * @returns {Mixed} JSX Frontend HTML.
	 */
	save: ( props) => {
		const blockProps = useBlockProps.save();
		console.log(props);
		const unpackedTabs = JSON.parse(props.attributes.tabs);
		console.log(unpackedTabs);
		const SaveTabs = () => (
			<div className="block-tabbed-content__tabs">
				{unpackedTabs.map(tab => <button class="block-tabbed-content__tab" data-interface="tab-button" data-tab={tab[0]}><img width="20px" height="20px" alt="" src=""/>{tab[1]}</button>)}
			</div>
		)
		return (
			<div { ...blockProps }>
				<SaveTabs />
				<InnerBlocks.Content />
			</div>
		);
	},
} );
