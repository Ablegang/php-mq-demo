<?php
// +----------------------------------------------------------------------
// | RedisProducer.php
// +----------------------------------------------------------------------
// | Description: 生产者
// +----------------------------------------------------------------------
// | Time: 2018/12/19 下午3:05
// +----------------------------------------------------------------------
// | Author: Object,半醒的狐狸<2252390865@qq.com>
// +----------------------------------------------------------------------

include_once 'boot.php';

try {

    \Ablegang\PhpMq\Queue::init('Redis', [
        'ip' => 'redis',
        'port' => 6379,
        'tubes' => 'tubes'
    ]); // 队列初始化

    // 生产者放入消息
    $job = new \Ablegang\PhpMq\Driver\Job([
        'job_data' => json_encode(['order_id' => time(), 'user_id' => '0001']),
        'tube' => 'default'
    ]);
    $job = \Ablegang\PhpMq\Queue::put($job);
    echo $job->id . PHP_EOL;

} catch (\Exception $e) {
    var_dump($e->getMessage());
}
