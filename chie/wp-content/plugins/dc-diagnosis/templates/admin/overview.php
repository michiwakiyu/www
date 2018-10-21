<input type="hidden" name="<?php echo esc_attr( DCD_Config::NAME ); ?>_nonce" value="<?php echo wp_create_nonce( DCD_Config::NAME ); ?>" />
<?php if ( $id ) : ?>
<input type="hidden" name="<?php echo esc_attr( DCD_Config::NAME ); ?>[id]" value="<?php echo esc_attr( $id ); ?>" />
<?php endif; ?>

<p class="dcd-item-name required">診断内容など（看板タイトルの下に表示）</p>
<p class="dcd_validation_error e_dc_diagnosis_theme"></p>
<input type="text" name="<?php echo esc_attr( DCD_Config::NAME ); ?>[theme]" value="<?php echo esc_attr( $theme ); ?>" maxlength="100">
<p class="dcd-item-name">看板画像</p>
<input type="text" id="dcd-media-url" class="widefat" name="<?php echo esc_attr( DCD_Config::NAME ); ?>[image_url]" value="<?php echo $image_url; ?>">
<button id="dcd-media-select" class="button">メディアライブラリから選択</button>
<button id="dcd-media-clear" class="button">画像をクリア</button>
<p><img id="dcd-media-image" src="<?php echo $image_url; ?>" style="width: 150px; height: auto;"></p>

<p class="dcd-item-name">ベースカラー</p>
<label class="wakatake"><span></span><input type="radio" name="<?php echo esc_attr( DCD_Config::NAME ); ?>[color_class]" value="wakatake" <?php if ($color_class == "wakatake") echo "checked"; ?>></label>
<label class="anzu"><span></span><input type="radio" name="<?php echo esc_attr( DCD_Config::NAME ); ?>[color_class]" value="anzu" <?php if ($color_class == "anzu") echo "checked"; ?>></label>
<label class="kutinashi"><span></span><input type="radio" name="<?php echo esc_attr( DCD_Config::NAME ); ?>[color_class]" value="kutinashi" <?php if ($color_class == "kutinashi") echo "checked"; ?>></label>
<label class="sora"><span></span><input type="radio" name="<?php echo esc_attr( DCD_Config::NAME ); ?>[color_class]" value="sora" <?php if ($color_class == "sora") echo "checked"; ?>></label>
<label class="utubushi"><span></span><input type="radio" name="<?php echo esc_attr( DCD_Config::NAME ); ?>[color_class]" value="utubushi" <?php if ($color_class == "utubushi") echo "checked"; ?>></label>
<br><br>

<?php
// 2018/08/25 一旦、機能OFF 
if (false) {
?>
<p class="dcd-item-name required">冒頭説明文</p>
<p class="dcd_validation_error e_dc_diagnosis_description"></p>
<?php wp_editor( $description, 'dcd_description', array( 'textarea_rows' => 10, 'media_buttons' => false ) ); ?>
<?php } ?>


<p class="dcd-item-name">診断の対象について</p>
<label><input type="checkbox" name="<?php echo esc_attr( DCD_Config::NAME ); ?>[opponent]" value="1" <?php if( $opponent == 1 ) echo "checked" ; ?>>診断の対象を「あいて」にする</label>

