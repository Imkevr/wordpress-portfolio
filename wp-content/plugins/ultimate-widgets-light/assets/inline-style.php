<?php
/**
 * Generates Inline styles
 */

class UWL_Inline_Style {
	private $style;
	private $add_style;

	/**
	 * Class Constructor
	 */
	public function __construct( $atts, $add_style ) {
		$this->style = array();
		$this->add_style = $add_style;

		// Loop through widget atts and run class methods
		foreach ( $atts as $key => $value ) {
			if ( ! empty( $value ) ) {
				$method = 'parse_' . $key;
				if ( method_exists( $this, $method ) ) {
					$this->$method( $value );
				}
			}
		}

	}

	/**
	 * Background
	 */
	private function parse_background( $value ) {
		$this->style[] = 'background:'.$value.';';
	}

	/**
	 * Background Color
	 */
	private function parse_background_color( $value ) {
		$value = 'none' == $value ? 'transparent' : $value;
		$this->style[] = 'background-color:'.$value.';';
	}

	/**
	 * Border: Color
	 */
	private function parse_border_color( $value ) {
		$value = 'none' == $value ? 'transparent' : $value;
		$this->style[] = 'border-color:'.$value.';';
	}

	/**
	 * Color
	 */
	private function parse_color( $value ) {
		$this->style[] = 'color:'.$value.';';
	}

	/**
	 * Text Align
	 */
	private function parse_text_align( $value ) {
		if ( 'textcenter' == $value ) {
			$value = 'center';
		} elseif ( 'textleft' == $value ) {
			$value = 'left';
		} elseif ( 'textright' == $value ) {
			$value = 'right';
		}
		$this->style[]  = 'text-align:'.$value.';';
	}

	/**
	 * Returns the styles
	 */
	public function return_style() {
		if ( ! empty( $this->style ) ) {
			$this->style = implode( false, $this->style );
			if ( $this->add_style ) {
				return ' style="'. esc_attr( $this->style ) .'"';
			} else {
				return esc_attr( $this->style );
			}
		} else {
			return null;
		}
	}


} // End Class

// Helper function runs the UWL_Inline_Style class
function uwl_inline_style( $atts = array(), $add_style = true ) {
	if ( ! empty( $atts ) && is_array( $atts ) ) {
		$inline_style = new UWL_Inline_Style( $atts, $add_style );
		return $inline_style->return_style();
	}
}