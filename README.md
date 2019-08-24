# CrazySSL PHP SDK
CrazySSL 和 Trustocean 的 PHP SDK

## 版本适配
- ![php5.6+.svg](https://img.shields.io/badge/PHP-5.6+-4c1.svg)
- ![laravel5.0+.svg](https://img.shields.io/badge/Laravel-5.0+-4c1.svg)

## 单元测试
- [![](https://api.travis-ci.org/crazyssl/sdk.svg?branch=master)](https://travis-ci.org/crazyssl/sdk)

## 优势

- composer 安装
- psr-4 自动加载, 不拖累项目速度
- 补全支持更友好
![image](https://user-images.githubusercontent.com/6964962/63114609-dede0480-bfc7-11e9-9d4f-a5694d5ee3ab.png)

## 安装

```bash
composer require crazyssl/sdk
```

## 使用

**非 Laravel项目中**
```php
use Crazyssl\Client as Crazyssl;

$sdk = new Crazyssl('你的 API 用户名', '你的 API 秘钥', 'https://api.trustocean.com/ssl/v3'); #如果你是crazyssl开发者的话, 第三个参数可以不传
$list = $sdk->product->getProductList();
print_r($list);
```

**Laravel项目中**
.env
```env
TRUSTOCEAN_USERNAME=邮箱
TRUSTOCEAN_PASSWORD=API_TOKEN

TRUSTOCEAN_PASSWORD=https://api.trustocean.com/ssl/v3 #只有当你使用trustocean时有必要，crazyssl请不要添加此配置
```

如果你laravel < 5.5，还需要修改 `config/app.php` 中的 `providers`
```php
    'providers' => [
        Crazyssl\LaravelServiceProvider::class,
    ],
```

在代码中使用
```php
/**
 * @var \Crazyssl\Client $sdk
 */
$sdk = app('trustocean');
print_r($sdk->product->getProductList());
```

## 授权

MIT
