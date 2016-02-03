<?php
$config['db_dsnw'] = 'mysql://' . getenv('MYSQL_USER') . ':' . getenv('MYSQL_PASSWORD') . '@' . getenv('MYSQL_HOST') . ':3306/' . getenv('MYSQL_DATABASE');
$config['default_host'] = 'tls://' . getenv('MAIL_HOST');
$config['smtp_server'] = 'tls://' . getenv('MAIL_HOST');
$config['default_port'] = 143;
$config['smtp_port'] = 587;
$config['smtp_user'] = '%u';
$config['smtp_pass'] = '%p';
$config['imap_conn_options'] = '';
$config['smtp_conn_options'] = '';
$config['managesieve_conn_options'] = [
  'ssl' => [
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true,
  ],
];
$config['plugins'] = ['managesieve'];
$config['des_key'] = 'ROUNDCUBE_RANDOM';
$config['mime_types'] = '/mime.types';
$config['product_name'] = '';
$config['support_url'] = '';
foreach (glob('/config/*.php') as $f) {
  require_once $f;
}
