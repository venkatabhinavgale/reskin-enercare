<?php

/**
 * CompanyAttributesInner
 *
 * PHP version 5
 *
 * @category Class
 * @package  SendinBlue\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
/**
 * SendinBlue API
 *
 * SendinBlue provide a RESTFul API that can be used with any languages. With this API, you will be able to :   - Manage your campaigns and get the statistics   - Manage your contacts   - Send transactional Emails and SMS   - and much more...  You can download our wrappers at https://github.com/orgs/sendinblue  **Possible responses**   | Code | Message |   | :-------------: | ------------- |   | 200  | OK. Successful Request  |   | 201  | OK. Successful Creation |   | 202  | OK. Request accepted |   | 204  | OK. Successful Update/Deletion  |   | 400  | Error. Bad Request  |   | 401  | Error. Authentication Needed  |   | 402  | Error. Not enough credit, plan upgrade needed  |   | 403  | Error. Permission denied  |   | 404  | Error. Object does not exist |   | 405  | Error. Method not allowed  |   | 406  | Error. Not Acceptable  |
 *
 * OpenAPI spec version: 3.0.0
 * Contact: contact@sendinblue.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 2.4.29
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */
namespace WPMailSMTP\Vendor\SendinBlue\Client\Model;

use ArrayAccess;
use WPMailSMTP\Vendor\SendinBlue\Client\ObjectSerializer;
/**
 * CompanyAttributesInner Class Doc Comment
 *
 * @category Class
 * @description List of attributes
 * @package  SendinBlue\Client
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class CompanyAttributesInner implements \WPMailSMTP\Vendor\SendinBlue\Client\Model\ModelInterface, \ArrayAccess
{
    const DISCRIMINATOR = null;
    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $swaggerModelName = 'CompanyAttributes_inner';
    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerTypes = ['internalName' => 'string', 'label' => 'string', 'attributeTypeName' => 'string', 'attributeOptions' => 'object[]', 'isRequired' => 'bool'];
    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @var string[]
     */
    protected static $swaggerFormats = ['internalName' => null, 'label' => null, 'attributeTypeName' => null, 'attributeOptions' => null, 'isRequired' => null];
    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }
    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }
    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = ['internalName' => 'internalName', 'label' => 'label', 'attributeTypeName' => 'attributeTypeName', 'attributeOptions' => 'attributeOptions', 'isRequired' => 'isRequired'];
    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = ['internalName' => 'setInternalName', 'label' => 'setLabel', 'attributeTypeName' => 'setAttributeTypeName', 'attributeOptions' => 'setAttributeOptions', 'isRequired' => 'setIsRequired'];
    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = ['internalName' => 'getInternalName', 'label' => 'getLabel', 'attributeTypeName' => 'getAttributeTypeName', 'attributeOptions' => 'getAttributeOptions', 'isRequired' => 'getIsRequired'];
    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }
    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }
    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }
    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }
    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];
    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['internalName'] = isset($data['internalName']) ? $data['internalName'] : null;
        $this->container['label'] = isset($data['label']) ? $data['label'] : null;
        $this->container['attributeTypeName'] = isset($data['attributeTypeName']) ? $data['attributeTypeName'] : null;
        $this->container['attributeOptions'] = isset($data['attributeOptions']) ? $data['attributeOptions'] : null;
        $this->container['isRequired'] = isset($data['isRequired']) ? $data['isRequired'] : null;
    }
    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];
        return $invalidProperties;
    }
    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return \count($this->listInvalidProperties()) === 0;
    }
    /**
     * Gets internalName
     *
     * @return string
     */
    public function getInternalName()
    {
        return $this->container['internalName'];
    }
    /**
     * Sets internalName
     *
     * @param string $internalName internalName
     *
     * @return $this
     */
    public function setInternalName($internalName)
    {
        $this->container['internalName'] = $internalName;
        return $this;
    }
    /**
     * Gets label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->container['label'];
    }
    /**
     * Sets label
     *
     * @param string $label label
     *
     * @return $this
     */
    public function setLabel($label)
    {
        $this->container['label'] = $label;
        return $this;
    }
    /**
     * Gets attributeTypeName
     *
     * @return string
     */
    public function getAttributeTypeName()
    {
        return $this->container['attributeTypeName'];
    }
    /**
     * Sets attributeTypeName
     *
     * @param string $attributeTypeName attributeTypeName
     *
     * @return $this
     */
    public function setAttributeTypeName($attributeTypeName)
    {
        $this->container['attributeTypeName'] = $attributeTypeName;
        return $this;
    }
    /**
     * Gets attributeOptions
     *
     * @return object[]
     */
    public function getAttributeOptions()
    {
        return $this->container['attributeOptions'];
    }
    /**
     * Sets attributeOptions
     *
     * @param object[] $attributeOptions attributeOptions
     *
     * @return $this
     */
    public function setAttributeOptions($attributeOptions)
    {
        $this->container['attributeOptions'] = $attributeOptions;
        return $this;
    }
    /**
     * Gets isRequired
     *
     * @return bool
     */
    public function getIsRequired()
    {
        return $this->container['isRequired'];
    }
    /**
     * Sets isRequired
     *
     * @param bool $isRequired isRequired
     *
     * @return $this
     */
    public function setIsRequired($isRequired)
    {
        $this->container['isRequired'] = $isRequired;
        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    #[\ReturnTypeWillChange]
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }
    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }
    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetSet($offset, $value)
    {
        if (\is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }
    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }
    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (\defined('JSON_PRETTY_PRINT')) {
            // use JSON pretty print
            return \json_encode(\WPMailSMTP\Vendor\SendinBlue\Client\ObjectSerializer::sanitizeForSerialization($this), \JSON_PRETTY_PRINT);
        }
        return \json_encode(\WPMailSMTP\Vendor\SendinBlue\Client\ObjectSerializer::sanitizeForSerialization($this));
    }
}
