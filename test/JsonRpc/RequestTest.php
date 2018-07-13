<?php
/**
 * @author Michał Żaloudik <ponury.kostek@gmail.com>
 */

namespace JsonRpc\Test;

use JsonRpc\Request;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase {
	public function testConstructor() {
		$this->assertInstanceOf(Request::class, new Request());
		$request = new Request([
			'id' => 1,
			'resource' => 'Test',
			'method' => 'test',
			'params' => []
		]);
		$this->assertInstanceOf(Request::class, $request);
		$this->assertEquals('{"version":"1.2.0","id":1,"resource":"Test","method":"test","params":[]}', $request->toString());
	}

	public function testToStringThrowOnMissingProps() {
		$this->expectException(\Error::class);
		(new Request())->toString();
	}
}
