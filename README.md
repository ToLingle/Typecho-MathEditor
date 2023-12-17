# Typecho-MathEditor
An integration with LaTeX formula editor for Typecho

## 为什么会有这个插件？
在使用Typecho搭建博客时，经常需要插入数学公式，而Typecho自带的Markdown编辑器并不支持数学公式，在查阅相关实现方式之后，我们自己~~缝合~~集成了一个插件，希望对您有所帮助。

我们使用```MathJax```进行渲染，不同于已有的插件，我们直接将其部署在服务器上，在调用时不再依靠访问外部链接，从而提高渲染效率。

```LaTeX```公式代码并不方便直接编辑，为了方便编辑，我们采用```Mathquill```作为辅助编辑插件。

## 如何使用？
1. 下载插件的release版本，将其解压到Typecho的插件目录中，并解压。
```注意解压到此目录下：/usr/plugins/```

2. 启用插件，在```Typecho```的后台管理中启用插件。
![点击启用插件](/image/image.png)
点击启用插件
![成功启用插件](/image/image-1.png)
3. 成功启用插件之后，进入文章编辑界面，可以看到新增的按钮
![Alt text](/image/<(}JNC715`ZEY(54XFN7SH[V.png>)
- tex按钮即为调用```Mathquill```作为辅助编辑
- dis按钮即为创建行间公式环境
- in按钮即为创建行内公式环境

## 待实现的功能：
- [1] 在创建公式环境之后，光标不换行，可以直接编辑占位句“your TeX code”

- [2] 在```Mathquill```中生成的LaTeX代码后，可以一键将其插入到已经创建的公式环境内
