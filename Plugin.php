<?php
/**
 * 针对默认编辑器的辅助插件,增加数学公式编辑按钮
 *
 * @package MathEditor
 * @author doge24190
 * @version 0.4
 * @link http://www.doge24190.top
 */
class MathEditor_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 插件版本号
     * @var string
     */
    const _VERSION = '0.4';
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     *
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static Function activate()
    {
		Typecho_Plugin::factory('admin/write-post.php')->bottom = array('MathEditor_Plugin', 'button');
		Typecho_Plugin::factory('admin/write-page.php')->bottom = array('MathEditor_Plugin', 'button');
        Typecho_Plugin::factory('Widget_Archive')->footer = array('MathEditor_Plugin', 'footer');
	}


public static function button(){
		?><style>.wmd-button-row {
    height: auto;
}</style>
		<script> 
          $(document).ready(function(){
          	$('#wmd-button-row').append('<li class="wmd-button" id="wmd-matheditor-button" title="公式编辑器"><span style="background: none;font-size: large;text-align: center;color: #999999;font-family: serif;">0</span></li>');
				if($('#wmd-button-row').length !== 0){
					$('#wmd-matheditor-button').click(function(){
					    const windowFeatures = "left=1000,top=200,width=420,height=280";
						window.open('/usr/plugins/MathEditor/editor', '_blank',windowFeatures,);
					})
				}

            $('#wmd-button-row').append('<li class="wmd-button" id="wmd-dis-button" title="TeX行间代码"><span style="background: none;font-size: 16px;text-align: center;color: #999999;font-family: serif;">dis</span></li>');
				if($('#wmd-button-row').length !== 0){
					$('#wmd-dis-button').click(function(){
						var rs = "$$\nyour TeX code\n$$\n";
                        TeX(rs);
					})
				}
            $('#wmd-button-row').append('<li class="wmd-button" id="wmd-in-button" title="TeX行内代码"><span style="background: none;font-size: 16px;text-align: center;color: #999999;font-family: serif;">in</span></li>');
				if($('#wmd-button-row').length !== 0){
					$('#wmd-in-button').click(function(){
						var ss = "$ your TeX code $";
                        TeX(ss);
					})
				}

            function TeX(tag) {
					var myField;
					if (document.getElementById('text') && document.getElementById('text').type == 'textarea') {
						myField = document.getElementById('text');
					} else {
						return false;
					}
					if (document.selection) {
						myField.focus();
						sel = document.selection.createRange();
						sel.text = tag;
						myField.focus();
					}
					else if (myField.selectionStart || myField.selectionStart == '0') {
						var startPos = myField.selectionStart;
						var endPos = myField.selectionEnd;
						var cursorPos = startPos;
						myField.value = myField.value.substring(0, startPos)
						+ tag
						+ myField.value.substring(endPos, myField.value.length);
						cursorPos += tag.length;
						myField.focus();
						myField.selectionStart = cursorPos;
						myField.selectionEnd = cursorPos;
					} else {
						myField.value += tag;
						myField.focus();
					}
				}
			});
</script>
<?php
}

	
    /**
     * 获取插件配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form){}

    /**
     * 个人用户的配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}

    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     *
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate(){}
      /**
     * 输出尾部js
     * 
     * @access public
     * @param unknown $footer
     * @return unknown
     */
    public static function footer() {
    echo '<script>
    MathJax = {
        tex:{
            inlineMath: [["$", "$"]],
            displayMath: [["$$", "$$"]],
        },
        svg: {
            fontCache: "global",
            scale: 1.0,
        }
    };
    </script>
    <script type="text/javascript" id="MathJax-script" async
        src="/usr/plugins/MathEditor/MathJax/tex-svg.js">
    </script>';
    }

}
