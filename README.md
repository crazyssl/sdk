# CrazySSL PHP SDK

## 安装

```bash
composer require crazyssl/sdk
```

## 使用

```php
use Crazyssl\Client as Crazyssl;

$sdk = new Crazyssl('你的 API 用户名', '你的 API 秘钥');
$list = $sdk->product->getProductList();
print_r($list);
```

## 授权

MIT