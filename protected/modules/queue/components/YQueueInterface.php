<?php

/**
 * YQueueInterface интерфейс для всех очередей
 *
 * @package yupe.modules.queue.components
 * @license  BSD https://raw.github.com/yupe/yupe/master/LICENSE
 * @since 0.1
 * @abstract
 *
 */
interface YQueueInterface
{
	public function add($worker, array $task);

	public function flush($worker = null);
}