<?php
/**
 * @package  ec_productPlugin
 */
namespace Inc;

final class Init
{
	/**
	 * Lưu trữ tất cả các Class bên trong một mảng
	 * @return array Full list of classes
	 */
	public static function get_services() 
	{
		return [
			Pages\Dashboard::class,
			Base\Enqueue::class,
			Base\SettingsLinks::class,
			Base\CustomLoginController::class,
			Base\CustomPostTypeController::class,
		];
	}

	/**
	 * Lặp qua các lớp, khởi tạo chúng,
	 * và gọi phương thức register () nếu nó tồn tại
	 * @return
	 */
	public static function register_services() 
	{
		foreach ( self::get_services() as $class ) {
			$service = self::instantiate( $class );
			if ( method_exists( $service, 'register' ) ) {
				$service->register();
			}
		}
	}

	/**
	 * Khởi tạo lớp
	 * @param  class $class   Class từ mảng get_services
	 * @return class instance  Class đã khởi tạo
	 */
	private static function instantiate( $class )
	{
		$service = new $class();

		return $service;
	}
}