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

## 优势

- composer 安装
- psr-4 自动加载, 不拖累项目速度
- 补全支持更友好
![image](https://user-images.githubusercontent.com/6964962/63114609-dede0480-bfc7-11e9-9d4f-a5694d5ee3ab.png)


## 授权

MIT