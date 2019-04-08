<?php

use Illuminate\Database\Seeder;

class SettingItemsSeeder extends Seeder
{
    public function run()
    {
        $preSetting = [
            'global' => $this->globals(),
            'payment' => $this->payments(),
            'user' => $this->users(),
            'captcha' => $this->captchas(),
            'contact' => $this->contacts(),
            'sms' => $this->sms(),
            'email' => $this->email(),
            'cache' => $this->cache(),
            'storage' => $this->storage(),
            'wechat-mp' => $this->wechatMP(),
        ];

        foreach ($preSetting as $group => $items) {
            $category = \App\Models\Category::whereSlug($group)->first();
            foreach ($items as $item) {
                /** @var \App\Models\SettingItem $model */
                $model = \App\Models\SettingItem::create(collect($item)->only(['name', 'slug', 'type'])->filter()->all());
                $model->attachCategories($category);
                $model->syncMeta(array_get($item, 'meta', []));
            }
        }
    }

    private function storage()
    {
        $type = [
            'local' => '本地',
            'alioss' => '阿里OSS',
            'qiniu' => '七牛',
            'upyun' => '又拍云',
        ];

        return [
            ['name' => '方式', 'slug' => 'storage_location', 'type' => 'single', 'meta' => ['value' => 'local', 'items' => $type]],

            ['name' => '图片后缀', 'slug' => 'storage_image_extensions', 'type' => 'string', 'meta' => ['value' => 'jpg,jpeg,png,gif,bmp,ico']],
            ['name' => '文件后缀', 'slug' => 'storage_file_extensions', 'type' => 'string', 'meta' => ['value' => 'txt,doc,docx,dot,wps,wri,pdf,ppt,xls,xlsx,ett,xlt,xlsm,csv,jpg,jpeg,png,psd,gif,ico,bmp,swf,avi,rmvb,rm,mp3,mp4,3gp,flv,mov,movie,rar,zip,bz,bz2,tar,gz']],
            ['name' => '本地', 'type' => 'split'],
            ['name' => '路径', 'slug' => 'local_location', 'type' => 'string', 'meta' => ['value' => '']],

            ['name' => '阿里OSS', 'type' => 'split'],
            ['name' => 'App Id', 'slug' => 'alioss_app_id', 'type' => 'string', 'meta' => ['value' => '']],
            ['name' => 'App Secret', 'slug' => 'alioss_app_secret', 'type' => 'password', 'meta' => ['value' => '']],
            ['name' => 'Bucket', 'slug' => 'alioss_bucket', 'type' => 'string', 'meta' => ['value' => '']],
            ['name' => 'CDN 域名', 'slug' => 'alioss_cdn', 'type' => 'string', 'meta' => ['value' => '']],
            ['name' => '内网模式', 'slug' => 'alioss_internal', 'type' => 'boolean', 'meta' => ['value' => false]],

            ['name' => '七牛', 'type' => 'split'],
            ['name' => 'App Id', 'slug' => 'qiniu_app_id', 'type' => 'string', 'meta' => ['value' => '']],
            ['name' => 'App Secret', 'slug' => 'qiniu_app_secret', 'type' => 'password', 'meta' => ['value' => '']],
            ['name' => 'Bucket', 'slug' => 'qiniu_bucket', 'type' => 'string', 'meta' => ['value' => '']],
            ['name' => 'CDN 域名', 'slug' => 'qiniu_cdn', 'type' => 'string', 'meta' => ['value' => '']],
            ['name' => '内网模式', 'slug' => 'qiniu_internal', 'type' => 'boolean', 'meta' => ['value' => false]],

            ['name' => '又拍云', 'type' => 'split'],
            ['name' => 'App Id', 'slug' => 'upyun_app_id', 'type' => 'string', 'meta' => ['value' => '']],
            ['name' => 'App Secret', 'slug' => 'upyun_app_secret', 'type' => 'password', 'meta' => ['value' => '']],
            ['name' => 'Bucket', 'slug' => 'upyun_bucket', 'type' => 'string', 'meta' => ['value' => '']],
            ['name' => 'CDN 域名', 'slug' => 'upyun_cdn', 'type' => 'string', 'meta' => ['value' => '']],
            ['name' => '内网模式', 'slug' => 'upyun_internal', 'type' => 'boolean', 'meta' => ['value' => false]],
        ];
    }

    private function wechatMP()
    {
        $type = [
            'dingyuehao' => '订阅号',
            'fuwuhao' => '服务号',
        ];

        return [
            ['name' => '类型', 'slug' => 'wechat_mp_type', 'type' => 'single', 'meta' => ['value' => 'dingyuehao', 'items' => $type]],
            ['name' => 'App Id', 'slug' => 'wechat_mp_app_id', 'type' => 'string', 'meta' => ['value' => '']],
            ['name' => 'App Secret', 'slug' => 'wechat_mp_app_secret', 'type' => 'password', 'meta' => ['value' => '']],
            ['name' => 'App Token', 'slug' => 'wechat_mp_app_token', 'type' => 'string', 'meta' => ['value' => '']],
        ];
    }

    public function cache()
    {
        $methods = [
            'file' => '文件',
            'redis' => 'Redis',
            'memcache' => 'Memcache',
        ];

        return [
            ['name' => '过期时长', 'slug' => 'duration', 'type' => 'string', 'meta' => ['value' => '1']],
            ['name' => '缓存方式', 'slug' => 'cache_driver', 'type' => 'single', 'meta' => ['value' => 'file', 'items' => $methods]],

            ['name' => '文件', 'type' => 'split'],
            ['name' => '缓存目录', 'slug' => 'file_dir', 'slug' => 'file_path', 'type' => 'string', 'meta' => ['value' => '']],

            ['name' => 'Redis', 'type' => 'split'],
            ['name' => '主机', 'slug' => 'redis_host', 'type' => 'string', 'meta' => ['value' => '127.0.0.1']],
            ['name' => '端口', 'slug' => 'redis_port', 'type' => 'string', 'meta' => ['value' => '6379']],
            ['name' => '密码', 'slug' => 'redis_password', 'type' => 'password', 'meta' => ['value' => '']],
            ['name' => '库', 'slug' => 'redis_db', 'type' => 'string', 'meta' => ['value' => 0]],

            ['name' => 'Memcache', 'type' => 'split'],
            ['name' => '主机列表', 'slug' => 'memcache_connections', 'type' => 'text', 'meta' => ['value' => '', 'help' => '一行一个，格式：127.0.0.1:10020']],
        ];
    }

    private function email()
    {
        $methods = [
            'smtp' => 'SMTP',
            'Sendmail' => 'SendMail',
        ];

        return [
            ['name' => '邮件方式', 'slug' => 'mail_driver', 'type' => 'single', 'meta' => ['value' => 'smtp', 'items' => $methods]],
            ['name' => 'SMTP', 'type' => 'split'],
            ['name' => '发件人名称', 'slug' => 'smtp_from', 'type' => 'string', 'meta' => ['value' => '']],
            ['name' => '主机', 'slug' => 'smtp_host', 'type' => 'string', 'meta' => ['value' => '']],
            ['name' => '端口', 'slug' => 'smtp_port', 'type' => 'string', 'meta' => ['value' => '']],
            ['name' => '用户名', 'slug' => 'smtp_username', 'type' => 'string', 'meta' => ['value' => '']],
            ['name' => '密码', 'slug' => 'smtp_password', 'type' => 'password', 'meta' => ['value' => '']],
        ];
    }

    private function sms()
    {
        return [
            ['name' => 'SMS', 'type' => 'string', 'meta' => ['value' => '']],
        ];
    }

    private function contacts()
    {
        return [
            ['name' => 'QQ', 'slug' => 'contact_qq', 'type' => 'string', 'meta' => ['value' => '']],
            ['name' => '微信', 'type' => 'string', 'meta' => ['value' => ''], 'slug' => 'contact_wechat'],
            ['name' => '旺旺', 'type' => 'string', 'meta' => ['value' => ''], 'slug' => 'contact_wangwang'],
            ['name' => '固定电话', 'type' => 'string', 'meta' => ['value' => ''], 'slug' => 'contact_phone'],
            ['name' => '手机', 'type' => 'string', 'meta' => ['value' => ''], 'slug' => 'contact_mobile_phone'],
            ['name' => 'Skype', 'type' => 'string', 'meta' => ['value' => ''], 'slug' => 'contact_skype'],
            ['name' => '传真', 'type' => 'string', 'meta' => ['value' => ''], 'slug' => 'contact_fax'],
            ['name' => 'Email', 'type' => 'string', 'meta' => ['value' => ''], 'slug' => 'contact_email'],
            ['name' => '地址', 'type' => 'string', 'meta' => ['value' => ''], 'slug' => 'contact_address'],
            ['name' => '微博', 'type' => 'string', 'meta' => ['value' => ''], 'slug' => 'contact_weibo'],
            ['name' => 'twitter', 'type' => 'string', 'meta' => ['value' => ''], 'slug' => 'contact_twitter'],
            ['name' => 'Facebook', 'type' => 'string', 'meta' => ['value' => ''], 'slug' => 'contact_facebook'],
            ['name' => '公司名称', 'type' => 'string', 'meta' => ['value' => ''], 'slug' => 'contact_company_name'],
            ['name' => '公司简介', 'type' => 'rich_text', 'meta' => ['value' => ''], 'slug' => 'contact_company_summary'],
            ['name' => '公司介绍', 'type' => 'rich_text', 'meta' => ['value' => ''], 'slug' => 'contact_company_description'],
        ];
    }

    private function captchas()
    {
        $captchaProvider = [
            'system' => '系统生成',
            'jiyan' => '极验证',
            'no_captcha' => 'No Captcha',
        ];
        $showCaptchaPosition = [
            'register' => '注册',
            'find_password' => '找回密码',
            'modify_password' => '更改',
        ];

        return [
            ['name' => '展示位置', 'type' => 'multi', 'meta' => ['value' => ['register'], 'items' => $showCaptchaPosition]],
            ['name' => '验证模式', 'type' => 'single', 'meta' => ['value' => ['system'], 'items' => $captchaProvider]],

            ['name' => '系统生成', 'type' => 'split'],
            ['name' => '字体', 'type' => 'string', 'meta' => ['value' => 'system']],
            ['name' => '长度', 'type' => 'string', 'meta' => ['value' => '4']],

            ['name' => 'No Captcha', 'type' => 'split'],
            ['name' => 'AppID', 'slug' => 'no_captcha_app_id', 'type' => 'string', 'meta' => ['value' => '']],
            ['name' => 'AppKey', 'slug' => 'no_captcha_app_key', 'type' => 'string', 'meta' => ['value' => '']],

            ['name' => '极验', 'type' => 'split'],
            ['name' => 'AppID', 'slug' => 'jiyan_app_id', 'type' => 'string', 'meta' => ['value' => '']],
            ['name' => 'AppKey', 'slug' => 'jiyan_app_key', 'type' => 'string', 'meta' => ['value' => '']],
        ];
    }

    private function users()
    {
        $checkMethods = [
            'auto' => '自动',
            'manual' => '手动',
            'mail' => '邮件',
            'sms' => '短信',
        ];

        return [
            ['name' => '验证方式', 'slug' => 'verify_method', 'type' => 'single', 'meta' => ['value' => 'auto', 'items' => $checkMethods]],
            ['name' => '使用注册协议', 'slug' => 'verify_use_register_protocol', 'type' => 'boolean', 'meta' => ['value' => false]],
            ['name' => '注册协议', 'slug' => 'verify_register_protocol', 'type' => 'rich_text', 'meta' => ['value' => '']],
        ];
    }

    private function payments()
    {
        return [
            ['name' => '支付渠道', 'type' => 'multi', 'meta' => ['value' => ['alipay', 'wechatpay'], 'items' => ['alipay' => '支付宝', 'wechatpay' => '微信']]],

            ['name' => '支付宝', 'type' => 'split'],
            ['name' => '签名方式', 'slug' => 'alipay_sign_type', 'type' => 'single', 'meta' => ['value' => 'RSA', 'items' => ['RSA' => 'RSA', 'RSA2' => 'RSA2']]],
            ['name' => '公钥', 'slug' => 'alipay_cert_public', 'type' => 'text', 'meta' => ['value' => '']],
            ['name' => '私钥', 'slug' => 'alipay_cert_private', 'type' => 'text', 'meta' => ['value' => '']],
            ['name' => '同步回调地址', 'slug' => 'alipay_callback_sync', 'type' => 'string', 'meta' => ['value' => '']],
            ['name' => '异步回调地址', 'slug' => 'alipay_callback_async', 'type' => 'string', 'meta' => ['value' => '']],

            ['name' => '微信支付', 'type' => 'split'],
            ['name' => 'APPID', 'slug' => 'wechatpay_mp_appid', 'type' => 'string', 'meta' => ['value' => '']],
            ['name' => '公众号AppSecret', 'slug' => 'wechatpay_mp_secret', 'type' => 'password', 'meta' => ['value' => '']],
            ['name' => '商户号', 'slug' => 'wechatpay_mch_id', 'type' => 'string', 'meta' => ['value' => '']],
            ['name' => '支付证书KEY', 'slug' => 'wechatpay_cert_key', 'type' => 'text', 'meta' => ['value' => '']],
            ['name' => '支付证书', 'slug' => 'wechatpay_cert', 'type' => 'text', 'meta' => ['value' => '']],
            ['name' => 'API Token', 'slug' => 'wechatpay_api_token', 'type' => 'password', 'meta' => ['value' => '']],
            ['name' => '同步回调地址', 'slug' => 'wechatpay_callback_sync', 'type' => 'string', 'meta' => ['value' => '']],
            ['name' => '异步回调地址', 'slug' => 'wechatpay_callback_async', 'type' => 'string', 'meta' => ['value' => '']],
        ];
    }

    private function globals()
    {
        return [
            ['name' => '网站名称', 'slug' => 'site_name', 'type' => 'string', 'meta' => ['value' => 'Air CMS']],
            ['name' => '网站Slogan', 'slug' => 'site_slogan', 'type' => 'string', 'meta' => ['value' => 'Easy as Air']],
            ['name' => 'LOGO', 'slug' => 'site_logo', 'type' => 'image_single', 'meta' => ['value' => 'logo.png']],
            ['name' => '网站描述', 'slug' => 'site_description', 'type' => 'text', 'meta' => ['value' => 'Easy as Air']],
            ['name' => '网站关键字', 'slug' => 'site_keywords', 'type' => 'text', 'meta' => ['value' => 'Easy as Air']],

            ['name' => '访问地址', 'slug' => 'site_visit_url', 'type' => 'split'],
            ['name' => '手机访问地址', 'slug' => 'site_url_mobile', 'type' => 'string', 'meta' => ['value' => 'http://air.local']],
            ['name' => 'PC访问地址', 'slug' => 'site_url_pc', 'type' => 'string', 'meta' => ['value' => 'http://m.air.local']],

            ['name' => '网站备案', 'slug' => 'site_number', 'type' => 'split'],
            ['name' => '工信部备案', 'slug' => 'site_number_icp', 'type' => 'string', 'meta' => ['value' => '京ICP备20190101']],
            ['name' => '公安部备案', 'slug' => 'site_number_police', 'type' => 'string', 'meta' => ['value' => '公安网备20190101']],

            ['name' => '统计代码', 'slug' => 'site_statistics', 'type' => 'split'],
            ['name' => '百度统计', 'slug' => 'site_statistics_baidu', 'type' => 'text', 'meta' => ['value' => '']],
            ['name' => '站长统计', 'slug' => 'site_statistics_cnzz', 'type' => 'text', 'meta' => ['value' => '']],
            ['name' => '51.la', 'slug' => 'site_statistics_51la', 'type' => 'text', 'meta' => ['value' => '']],

            ['name' => '附加代码', 'slug' => 'site_inject_code', 'type' => 'split'],
            ['name' => '头部', 'slug' => 'site_inject_code_header', 'type' => 'text', 'meta' => ['value' => '<!-- header -->']],
            ['name' => '底部', 'slug' => 'site_inject_code_footer', 'type' => 'text', 'meta' => ['value' => '<!-- footer -->']],

            ['name' => 'SEO', 'slug' => 'site_seo', 'type' => 'split'],
            ['name' => '百度主动推送', 'slug' => 'site_seo_baidu_autopush', 'type' => 'string', 'meta' => ['value' => '', 'help' => '请填写百度主动推送代码的Token']],
            ['name' => '百度被动推送', 'slug' => 'site_seo_baidu_visitpush', 'type' => 'text', 'meta' => ['value' => '']],
            ['name' => '360被动推送', 'slug' => 'site_seo_360_push', 'type' => 'text', 'meta' => ['value' => '']],
        ];
    }
}
