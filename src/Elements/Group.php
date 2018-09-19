<?php

namespace Galahad\Aire\Elements;

use Galahad\Aire\Aire;
use Illuminate\Support\HtmlString;

class Group extends Element
{
	protected $view = 'group';
	
	/**
	 * @var \Galahad\Aire\Elements\GroupableElement
	 */
	protected $element;
	
	public function __construct(Aire $aire, GroupableElement $element)
	{
		parent::__construct($aire);
		
		$this->element = $element;
	}
	
	public function label(string $label) : self
	{
		$this->view_data['label'] = new Label($this->aire, $label, $this->element);
		
		return $this;
	}
	
	protected function viewData()
	{
		return array_merge(parent::viewData(), [
			'element' => new HtmlString($this->element->renderInsideElement()),
		]);
	}
}
