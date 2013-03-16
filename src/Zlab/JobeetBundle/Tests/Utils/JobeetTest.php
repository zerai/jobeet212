<?php

namespace Zlab\JobeetBundle\Tests\Utils;
use Zlab\JobeetBundle\Utils\Jobeet;

class JobeetTest extends \PHPUnit_Framework_TestCase
{
	public function testSlugify()
	{
		$this->assertEquals('sensio', Jobeet::slugify('Sensio'));
		$this->assertEquals('sensio', Jobeet::slugify('Sensio    '));
		$this->assertEquals('sensio', Jobeet::slugify('   Sensio'));
		$this->assertEquals('sensio-lab', Jobeet::slugify('Sensio lab'));
		$this->assertEquals('sensio-lab', Jobeet::slugify('Sensio    lab'));
		$this->assertEquals('sensio-lab', Jobeet::slugify('  Sensio    lab  '));
		$this->assertEquals('roma-italia', Jobeet::slugify('Roma,Italia'));
		
		/* Stringa vuota e con spazi*/
		$this->assertEquals('n-a', Jobeet::slugify(''));
		$this->assertEquals('n-a', Jobeet::slugify('   '));
		
		/* Caratteri ascii */
		$this->assertEquals('n-a', Jobeet::slugify(' - '));

		/* Parole con accento*/
		$this->assertEquals('developpeur-web', Jobeet::slugify('Développeur Web'));

		if (function_exists('iconv'))
		{
		  $this->assertEquals('developpeur-web', Jobeet::slugify('Développeur Web'));
		}
	}
}