<?php
/**
 * The classes defining Whatsapp template Response
 *
 * @link       www.algaweb.it
 * @since      1.0.0
 * @author     Gabriele Valle <info@algaweb.it>
 *
 * @package    Woo_App
 * @subpackage Woo_App/admin
 */

class WafwcTemplateMessageList
{
	/** @var WafwcData[] */
	public array $data;
	public WafwcPaging $paging;

	/**
	 * @param WafwcData[] $data
	 */
	public function __construct(array $data, WafwcPaging $paging)
	{
		$this->data = $data;
		$this->paging = $paging;
	}

	public static function fromJson(\stdClass $data): self
	{
		return new self(
			array_map(static function($data) {
				return WafwcData::fromJson($data);
			}, $data->data),
			WafwcPaging::fromJson($data->paging)
		);
	}

	public static function getWaTemplateList() {
		$wa_business_id = get_option('wafwc-wa-id');
		$token = get_option('wafwc-wa-token');
		$url = 'https://graph.facebook.com/v15.0/'. $wa_business_id .'/message_templates?access_token='.$token;

		if (isset($token) && $token !== '') {
			return wp_remote_get( $url );
		}

		return new WP_Error(500, 'Check your Token');
	}
}

class WafwcData
{
	public string $name;
	/** @var WafwcDataComponents[] */
	public array $components;
	public string $language;
	public string $status;
	public string $category;
	public string $id;

	/**
	 * @param WafwcDataComponents[] $components
	 */
	public function __construct(string $name, array $components, string $language, string $status, string $category, string $id)
	{
		$this->name = $name;
		$this->components = $components;
		$this->language = $language;
		$this->status = $status;
		$this->category = $category;
		$this->id = $id;
	}

	public static function fromJson(\stdClass $data): self
	{
		return new self(
			$data->name,
			array_map(static function($data) {
				return WafwcDataComponents::fromJson($data);
			}, $data->components),
			$data->language,
			$data->status,
			$data->category,
			$data->id
		);
	}
}

class WafwcDataComponents
{
	public string $type;
	public ?string $format;
	public string $text;

	public function __construct(string $type, ?string $format, ?string $text)
	{
		$this->type = $type;
		$this->format = $format;
		$this->text = $text;
	}

	public static function fromJson(\stdClass $data): self
	{
		return new self(
			$data->type,
			$data->format ?? null,
			$data->text ?? '',
		);
	}
}

class WafwcPaging
{
	public WafwcCursors $cursors;

	public function __construct(WafwcCursors $cursors)
	{
		$this->cursors = $cursors;
	}

	public static function fromJson(\stdClass $data): self
	{
		return new self(
			WafwcCursors::fromJson($data->cursors)
		);
	}
}

class WafwcCursors
{
	public string $before;
	public string $after;

	public function __construct(string $before, string $after)
	{
		$this->before = $before;
		$this->after = $after;
	}

	public static function fromJson(\stdClass $data): self
	{
		return new self(
			$data->before,
			$data->after
		);
	}
}