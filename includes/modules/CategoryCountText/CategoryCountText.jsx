// External Dependencies
import React, { Component } from "react";

// Internal Dependencies
import "./style.css";
import Input from "../../fields/Input/Input";

class CategoryCountText extends Component {
  static slug = "wcac_category_count_text";

  render() {
    const Content = this.props.content;

    return (
      <h1 className="alaki">
        <Content />
      </h1>
    );
  }
}

export default CategoryCountText;
