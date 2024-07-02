<?php
#region usings
namespace de\PersonalLibrary\HTML\Enum;

use de\PersonalLibrary\Enum\IEnumBase;
use de\PersonalLibrary\Enum\StatusCode;
use de\PersonalLibrary\Exception\NotFoundException;
#endregion

/**
 * @version 1.0 
 * @version lastUpdate 2023/08/22
 * @author Florian Burghardt
 * @copyright Copyright (c) 2023, Florian Burghardt
 */
enum TagList: string implements IEnumBase
{
	case Address = 'Area/Address';
	case Article = 'Area/Article';
	case Aside = 'Area/Aside';
	case Footer = 'Area/Footer';
	case Header = 'Area/Header';
	case Main = 'Area/Main';
	case Nav = 'Area/Nav';
	case Section = 'Area/Section';
	case Blockquote = 'Block/Blockquote';
	case Br = 'Block/Br';
	case Details = 'Bock/Details';
	case Div = 'Block/Div';
	case H1 = 'Block/H1';
	case H2 = 'Block/H2';
	case H3 = 'Block/H3';
	case H4 = 'Block/H4';
	case H5 = 'Block/H5';
	case H6 = 'Block/H6';
	case Hr = 'Block/Hr';
	case P = 'Block/P';
	case Pre = 'Block/Pre';
	case Summary = 'Block/Summary';
	case Template = 'Block/Template';
	case Wbr = 'Block/Wbr';
	case Button = 'Form/Button';
	case Datalist = 'Form/Datalist';
	case Fieldset = 'Form/Fieldset';
	case Form = 'Form/Form';
	case Input = 'Form/Input';
	case Label = 'Form/Label';
	case Legend = 'Form/Legend';
	case Optgroup = 'Form/Optgroup';
	case Option = 'Form/Option';
	case Output = 'Form/Output';
	case Select = 'Form/Select';
	case Textarea = 'Form/Textarea';
	case Base = 'Head/Base';
	case Link = 'Head/Link';
	case Meta = 'Head/Meta';
	case Noscript = 'Head/Noscript';
	case Script = 'Head/Script';
	case Style = 'Head/Style';
	case Title = 'Head/Title';
	case Abbr = 'Inline/Abbr';
	case B = 'Inline/B';
	case Bdi = 'Inline/Bdi';
	case Bdo = 'Inline/Bdo';
	case Cite = 'Inline/Cite';
	case Code = 'Inline/Code';
	case Data = 'Inline/Data';
	case Del = 'Inline/Del';
	case Dfn = 'Inline/Dfn';
	case Em = 'Inline/Em';
	case I = 'Inline/I';
	case Ins = 'Inline/Ins';
	case Kbd = 'Inline/Kbd';
	case Mark = 'Inline/Mark';
	case Q = 'Inline/Q';
	case S = 'Inline/S';
	case Samp = 'Inline/Samp';
	case Small = 'Inline/Small';
	case Span = 'Inline/Span';
	case Strong = 'Inline/Strong';
	case Sub = 'Inline/Sub';
	case Sup = 'Inline/Sup';
	case Time = 'Inline/Time';
	case U = 'Inline/U';
	case Var_ = 'Inline/Var_';
	case Dd = 'Lists/Dd';
	case Dl = 'Lists/Dl';
	case Dt = 'Lists/Dt';
	case Li = 'Lists/Li';
	case Menu = 'Lists/Menu';
	case Ol = 'Lists/Ol';
	case Ul = 'Lists/Ul';
	case A = 'Media/A';
	case Area = 'Media/Area';
	case Audio = 'Media/Audio';
	case Canvas = 'Media/Canvas';
	case Dialog = 'Media/Dialog';
	case Embed = 'Media/Embed';
	case Figcaption = 'Media/Figcaption';
	case Figure = 'Media/Figure';
	case Iframe = 'Media/Iframe';
	case Img = 'Media/Img';
	case Map = 'Media/Map';
	case Meter = 'Media/Meter';
	case Object_ = 'Media/Object_';
	case Param = 'Media/Param';
	case Picture = 'Media/Picture';
	case Progress = 'Media/Progress';
	case Source = 'Media/Source';
	case Svg = 'Media/Svg';
	case Track = 'Media/Track';
	case Video = 'Media/Video';
	case Caption = 'Table/Caption';
	case Col = 'Table/Col';
	case Colgroup = 'Table/Colgroup';
	case Table = 'Table/Table';
	case Tbody = 'Table/Tbody';
	case Td = 'Table/Td';
	case Tfoot = 'Table/Tfoot';
	case Th = 'Table/Th';
	case Thead = 'Table/Thead';
	case Tr = 'Table/Tr';
	case Body = 'Body';
	case HTML = 'HTML';
	case Head = 'Head';
	
	public static function get(string $keyword): self
	{ 
		foreach (self::cases() as $item)
		{
			if(strtoupper($item->name) === strtoupper($keyword)) { return $item; }
		}
		throw new NotFoundException($keyword.' is not an element of the Enum', StatusCode::NOT_FOUND->value, 9200);
	}

	public static function tryGet(string $keyword): self|null
	{ 
		foreach (self::cases() as $item)
		{
			if(strtoupper($item->name) === strtoupper($keyword)) { return $item; }
		}
		return null;
	}
}
?>