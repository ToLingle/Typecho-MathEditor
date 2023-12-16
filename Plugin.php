<?php
/**
 * 集成LaTeX公式编辑工具
 *
 * @package MathEditor
 * @author doge24190
 * @version 0.2
 * @link http://www.doge24190.top
 */
class MathEditor_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 插件版本号
     * @var string
     */
    const _VERSION = '0.2';
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
          	$('#wmd-button-row').append('<li class="wmd-button" id="wmd-jrotty-button" title="公式编辑器"><span style="background: none;font-size: large;text-align: center;color: #999999;font-family: serif;">0</span></li>');
				if($('#wmd-button-row').length !== 0){
					$('#wmd-jrotty-button').click(function(){
						window.open('/usr/plugins/MathEditor/editor', '_blank');
					})
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
    MathEditor_Plugin = {
        tex:{
            inlineMath: [["$", "$"]],
            displayMath: [["$$", "$$"]],
        },
        svg: {
            fontCache: "global",
    };
            scale: 1.0,
        }
    </script>
    <script type="text/javascript" id="MathJax-script" async
        src="/usr/plugins/MathEditor/MathJax/tex-svg.js">
    </script>';
    }

}
