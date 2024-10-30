<?php
/**
 * The classes defining Whatsapp message template
 *
 * @link       www.algaweb.it
 * @since      1.0.0
 * @author     Gabriele Valle <info@algaweb.it>
 *
 * @package    Woo_App
 * @subpackage Woo_App/admin
 */

class WafwcTemplateMessage
{
	public string $messaging_product;
	public string $to;
	public string $type;
	public WafwcTemplate $template;

	public function __construct(string $messagingProduct, string $to, string $type, WafwcTemplate $template)
	{
		$this->messaging_product = $messagingProduct ?: 'whatsapp';
		$this->to = $to;
		$this->type = $type ?: 'template';
		$this->template = $template;
	}

	public function expose() {
		return get_object_vars($this);
	}
}

class WafwcTemplateMessagePlain
{
	public string $messaging_product;
	public string $to;
	public string $type;
	public WafwcTemplatePlain $template;

	public function __construct(string $messagingProduct, string $to, string $type, WafwcTemplatePlain $template)
	{
		$this->messaging_product = $messagingProduct ?: 'whatsapp';
		$this->to = $to;
		$this->type = $type ?: 'template';
		$this->template = $template;
	}

	public function expose() {
		return get_object_vars($this);
	}
}

class WafwcTemplate
{
	public string $name;
	public WafwcLanguage $language;
	/** @var WafwcComponents[] */
	public array $components;

	/**
	 * @param WafwcComponents[] $components
	 */
	public function __construct(string $name, WafwcLanguage $language, array $components)
	{
		$this->name = $name;
		$this->language = $language;
		$this->components = $components;
	}
}

class WafwcTemplatePlain
{
	public string $name;
	public WafwcLanguage $language;

	public function __construct(string $name, WafwcLanguage $language)
	{
		$this->name = $name;
		$this->language = $language;
	}
}

class WafwcLanguage
{
	public string $code;

	public function __construct(string $code)
	{
		$this->code = $code;
	}
}

class  WafwcComponents
{
	public string $type;
	/** @var WafwcParameters[] */
	public array $parameters;

	/**
	 * @param WafwcParameters[] $parameters
	 */
	public function __construct(string $type, array $parameters)
	{
		$this->type = $type;
		$this->parameters = $parameters;
	}
}

class  WafwcParameters
{
	public string $type;
	public string $text;

	public function __construct(string $type, string $text)
	{
		$this->type = $type;
		$this->text = $text;
	}
}