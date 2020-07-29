<?php
namespace App\Exceptions;

use RuntimeException;
use App\Exceptions\Exception;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\QueryException;

class AlreadyAttendedInLotteryException extends \Exception
{
    // /**
    //  * The underlying response instance.
    //  *
    //  * @var \Symfony\Component\HttpFoundation\Response
    //  */
    // protected $response;

    // /**
    //  * Create a new HTTP response exception instance.
    //  *
    //  * @param  \Symfony\Component\HttpFoundation\Response  $response
    //  * @return void
    //  */
    // public function __construct(Response $response)
    // {
    //     $this->response = $response;
    // }

    /**
     * Set custome message for this exception
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function withMessage($phoneNumber)
    {
        $instance = new self(
            $exception->getMessage(),
            0,
            'This phone number ('.$phoneNumber.'has already been attended in the lottery before.'
        );

        // $instance->userId = $userId;

        return $instance;
    }
}