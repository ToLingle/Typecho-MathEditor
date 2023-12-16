# Typecho-MathEditor
An integration with LaTeX formula editor for Typecho

在使用Typecho搭建博客时，经常需要插入数学公式，而Typecho自带的Markdown编辑器并不支持数学公式，因此需要一个支持数学公式的Markdown编辑器。

我们使用```MathJax```进行渲染，不同与已有的插件，我们直接将其部署在服务器上，在调用时不再依靠访问外部链接，从而提高渲染效率。

```LaTeX```公式代码并不方便直接编辑，为了方便编辑，我们采用```Mathquill```作为辅助编辑插件。