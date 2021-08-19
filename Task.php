<?php


class Task
{
    // статусы
    const STATUS_NEW = "new";
    const STATUS_CANCELED = "canceled";
    const STATUS_IN_WORK = "in work";
    const STATUS_COMPLETED = "completed";
    const STATUS_FAILED = "failed";

    const STATUSES = [
        self::STATUS_NEW => 'Новый',
        self::STATUS_CANCELED => 'Отменено',
        self::STATUS_IN_WORK => 'В работе',
        self::STATUS_COMPLETED => 'Выполнено',
        self::STATUS_FAILED => 'Провалено',
    ];

    // действия
    const ACTION_CANCEL = "cancel";
    const ACTION_ACCEPT = "accept";
    const ACTION_COMPLETE = "complete";
    const ACTION_REFUSE = "refuse";

    const ACTIONS = [
        self::ACTION_CANCEL => 'Отменить',
        self::ACTION_ACCEPT => 'Принять',
        self::ACTION_COMPLETE => 'Завершить',
        self::ACTION_REFUSE => 'Отказаться',
    ];

    // изменение статуса действием
    protected $actions_set_status = [
        self::ACTION_CANCEL => self::STATUS_CANCELED,
        self::ACTION_ACCEPT => self::STATUS_IN_WORK,
        self::ACTION_COMPLETE => self::STATUS_COMPLETED,
        self::ACTION_REFUSE => self::STATUS_FAILED,
    ];

    protected $available_actions = [
        self::STATUS_NEW => [self::ACTION_CANCEL, self::ACTION_ACCEPT],
        self::STATUS_CANCELED => [],
        self::STATUS_IN_WORK => [self::ACTION_COMPLETE, self::ACTION_REFUSE],
        self::STATUS_COMPLETED => [],
        self::STATUS_FAILED => []
    ];

    protected $employer_id;
    protected $freelancer_id;
    protected $current_status;

    public function __construct(int $employer_id, int $freelancer_id, string $current_status)
    {
        $this->employer_id = $employer_id;
        $this->freelancer_id = $freelancer_id;
        $this->current_status = $current_status;
    }

    /**
     * @return string Возвращает статус задачи.
     */
    public function get_current_status(): string
    {
        return $this->current_status;
    }

    /**
     * @return array Возвращает все статусы.
     */
    public function get_statuses(): array
    {
        return self::STATUSES;
    }

    /**
     * @return array Возвращает все действия.
     */
    public function get_actions(): array
    {
        return self::ACTIONS;
    }

    /**
     * @param string $action
     * @return string Статус в который перейдет задача
     */
    public function get_status_from_action (string $action): ?string
    {
        return isset($this->actions_set_status[$action]) ? $this->actions_set_status[$action] : '';
    }


    /**
     * @param string $status
     * @return array Доступные действия для переданного статуса.
     */
    public function get_actions_for_status (string $status): ?array
    {
        return isset($this->available_actions[$status]) ? $this->available_actions[$status] : [];
    }
}
