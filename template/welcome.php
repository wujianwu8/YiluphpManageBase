<!--{use_layout layout/admin_main}-->
<?php
$head_info = [
    'title' => YiluPHP::I()->lang('welcome_to_the_yiluphp'),
];
?>

<p><?php echo YiluPHP::I()->lang('welcome_to_the_yiluphp'); ?></p>
<p><?php echo YiluPHP::I()->lang('current_version').get_version(); ?></p>
<p><?php echo YiluPHP::I()->lang('current_environment').env(); ?></p>
<p>
    <?php echo YiluPHP::I()->lang('official_website'); ?>
    <a href="http://www.YiluPHP.com">www.YiluPHP.com</a>
</p>

<hr>

<div><?php echo YiluPHP::I()->lang('from_helper_result').$test_helper; ?></div>
<div><?php echo YiluPHP::I()->lang('from_model_result').$test_model; ?></div>
<div>
    <?php echo YiluPHP::I()->lang('route_rewrite_demo'); ?>
    <a href="/article/detail/9">/article/detail/9</a>
</div>
<div>
    <?php echo YiluPHP::I()->lang('parameter_xxx_is_correct', ['field'=>'article_id']); ?>
    <a href="/?article_id=6">/?article_id=6</a>
</div>
<div>
    <?php echo YiluPHP::I()->lang('parameter_xxx_error', ['field'=>'article_id']); ?>
    <a href="/?article_id=77">/?article_id=77</a>
</div>
<div>
    <?php echo YiluPHP::I()->lang('parameter_xxx_is_correct', ['field'=>'title']); ?>
    <a href="/?title=aa">/?title=aa</a>
</div>
<div>
    <?php echo YiluPHP::I()->lang('parameter_xxx_error', ['field'=>'title']); ?>
    <a href="/?title=bbbccc">/?title=bbbccc</a>
</div>
<div>
    <?php echo YiluPHP::I()->lang('submit_encryption_parameter'); ?> <i>mobile</i>：
    <input type="text" id="mobile" value="18812345678">
    <button id="btn"><?php echo YiluPHP::I()->lang('submit'); ?></button>
</div>
<h3>
    <?php echo YiluPHP::I()->lang('get_parameters'); ?><br>
    article_id=<span class="error"><?php echo $article_id; ?></span><br>
    title=<span class="error"><?php echo $title; ?></span><br>
    mobile=<span class="error" id="showMobile"></span>
</h3>

<script>
    $(function() {
        $("#btn").bind("click", function (e) {
            var params = {
                dtype: "json",
                mobile: $("#mobile").val()
            };
            //加密mobile参数
            params = rsaEncryptData(params, ["mobile"]);
            $.ajax({
                method: "POST",
                url: "welcome",
                dataType: "json",
                data: params
            }).done(function( res ) {
                console.log(res);
                if (res.code==0){
                    $("#showMobile").text(res.data.mobile);
                }
                else{
                    alert(res.msg);
                }
            }).fail(function( jqXHR, textStatus ) {
                alert( "Request failed: " + textStatus );
            });
        });
    });
</script>