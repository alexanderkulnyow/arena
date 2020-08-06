<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

do_action( 'woocommerce_before_customer_login_form' ); ?>


<?php

if ( isset( $_GET["action"] ) && $_GET["action"] == "register" ) {

	?>

	<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

        <div class="" id="customer_login mb-20">
            <div class="row">
                <!--	--><?php //endif; ?>
                <div class="w-100"></div>
                <div class="col-12">
                    <h2 class=""><?php esc_html_e( 'Register', 'woocommerce' ); ?></h2>
                    <div class="w-100"></div>
                    <form method="post"
                          class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

						<?php do_action( 'woocommerce_register_form_start' ); ?>
                        <p>

                        </p>
						<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide my-account__form">
                                <label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;<span
                                            class="required">*</span></label>
                                <span class="w-100"></span>
                                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text"
                                       name="username"
                                       id="reg_username" autocomplete="username"
                                       value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>"/><?php // @codingStandardsIgnoreLine ?>
                            </p>

						<?php endif; ?>

                        <p class="m-0 p-0 woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide my-account__form">
                            <label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span
                                        class="required">*</span></label>
                            <span class="w-100"></span>
                            <input type="email" class="woocommerce-Input woocommerce-Input--text input-text"
                                   name="email"
                                   id="reg_email" autocomplete="email"
                                   value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>"/><?php // @codingStandardsIgnoreLine ?>
                        </p>

						<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide my-account__form">
                                <label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span
                                            class="required">*</span></label>
                                <span class="w-100"></span>
                                <input type="password" class="woocommerce-Input woocommerce-Input--text input-text"
                                       name="password" id="reg_password" autocomplete="new-password"/>
                            </p>

						<?php else : ?>

                            <p class="pt-10"><?php esc_html_e( 'A password will be sent to your email address.', 'woocommerce' ); ?></p>

						<?php endif; ?>

						<?php do_action( 'woocommerce_register_form' ); ?>

                        <p class="m-0 p-0 woocommerce-FormRow form-row">
							<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
                            <button type="submit" class="arena__button" name="register"
                                    value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
                        </p>

						<?php do_action( 'woocommerce_register_form_end' ); ?>

                    </form>

                </div>

            </div>
        </div>
	<?php endif; ?>

	<?php

} else {

	?>

	<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

        <div class="" id="customer_login mb-20">
            <div class="row">
                <!--                		--><?php //endif; ?>
                <div class="col-12">
                    <h2><?php esc_html_e( 'Login', 'woocommerce' ); ?></h2>
                    <div class="w-100"></div>
                    <form class="auth__fields  woocommerce-form woocommerce-form-login login col-12" method="post">

						<?php do_action( 'woocommerce_login_form_start' ); ?>

                        <p class="auth__fields  woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide my-account__form">
                            <label for="username"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>
                                &nbsp;<span
                                        class="required">*</span></label>
                            <span class="w-100"></span>
                            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text"
                                   name="username"
                                   id="username" autocomplete="username"
                                   value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>"/><?php // @codingStandardsIgnoreLine ?>
                        </p>
                        <p class="auth__fields  woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide my-account__form">
                            <label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span
                                        class="required">*</span></label>
                            <span class="w-100"></span>
                            <input class="woocommerce-Input woocommerce-Input--text input-text" type="password"
                                   name="password"
                                   id="password" autocomplete="current-password"/>
                        </p>

						<?php do_action( 'woocommerce_login_form' ); ?>

                        <p class="auth__checkbox form-row">
                            <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                                <input class="woocommerce-form__input woocommerce-form__input-checkbox"
                                       name="rememberme"
                                       type="checkbox" id="rememberme" value="forever"/>
                                <span><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
                            </label>
							<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
                            <span class="w-100"></span>

                        </p>
                        <div class="auth__submin">
                            <button type="submit"
                                    class="arena__button"
                                    name="login"
                                    value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>
                        </div>
                        <div class="woocommerce-LostPassword lost_password">
                            <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
                            <br>
                            <p>Еще нет аккаунта?  <a href="<?php echo get_permalink( wc_get_page_id( 'myaccount' ) ) ?>?action=register">
                                Зарегистрируйтесь.</a></p>

                        </div>

						<?php do_action( 'woocommerce_login_form_end' ); ?>

                    </form>
                </div>


            </div>
        </div>
	<?php endif; ?>

	<?php

}

?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
