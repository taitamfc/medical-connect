<?php
include_once MC_PATH.'lib/MysqliDb.php';
class MainModel {
    protected $table;
    protected $app_db;
    protected $limit = 20;
    protected $fields = [];
    protected $primaryKey = 'id';

    public function __construct(){
        $this->app_db = new MysqliDb ([
            'host' => DB_HOST,
            'username' => DB_USER, 
            'password' => DB_PASSWORD,
            'db'=> DB_NAME,
            'port' => 3306,
            'prefix' => '',
            'charset' => 'utf8'
        ]);
    }
    public function all($options = []){
        $pagination = isset( $options['pagination'] ) ? $options['pagination'] : false;
        $page       = isset( $options['paged'] ) ? $options['paged'] : 1;
        $limit      = isset( $options['limit'] ) ? $options['limit'] : null;
        $search     = isset( $options['search'] ) ? $options['search'] : [];
        $joins      = isset( $options['join'] ) ? $options['join'] : [];
        $operators  = isset( $options['operators'] ) ? $options['operators'] : [];
        $order      = isset( $options['order'] ) ? $options['order'] : [
            'orderBy' => $this->primaryKey,
            'orderDir' => 'desc'
        ];
        $fields = isset( $options['fields'] ) && is_array($options['fields']) && count($options['fields']) ? implode(',',$options['fields']) : [];
        if( count($joins) ){
            foreach( $joins as $join ){
                $this->app_db->join($join[0], $join[1]);
            }
        }
        if( count($search) ){
            foreach( $search as $field => $value ){
                $this->app_db->where (
                    $field, 
                    $value,
                    isset($operators[$field]) ? $operators[$field] : '='
                );
            }
        }
        $this->app_db->orderBy($order['orderBy'],$order['orderDir']);

        if($pagination){
            $this->app_db->pageLimit = $limit ? $limit : $this->limit;
            $items = $this->app_db->arraybuilder()->paginate($this->table, $page);
            $return = [
                'items' => $items,
                'totalPages' => $this->app_db->totalPages,
                'totalCount' => $this->app_db->totalCount,
                'pageLimit' => $this->app_db->pageLimit,
            ];
        }else{
            $return = $this->app_db->get($this->table,$limit,$fields);
        }
        return $return;
    }

    public function find($id,$options = []){
        $this->app_db->where ($this->primaryKey, $id);
        $item = $this->app_db->getOne ($this->table,$options['fields']);
        return $item;
    }

    public function findBy($field,$value){
        $this->app_db->where ($field,$value);
        $item = $this->app_db->getOne ($this->table);
        return $item;
    }

    public function save($data,$options = []){
        $id = $this->app_db->insert ($this->table, $data);
        if($id){
            return $id;
        }else{
            die(__METHOD__.':'.$this->app_db->getLastError());
        }
    }
    public function update($id,$data,$options = []){
        $this->app_db->where ($this->primaryKey,$id);
        $updated = $this->app_db->update  ($this->table, $data);
        if($updated){
            return $updated;
        }else{
            die(__METHOD__.':'.$this->app_db->getLastError());
        }
    }
    public function delete($id,$options = []){
        $this->app_db->where ($this->primaryKey,$id);
        $deleted = $this->app_db->delete($this->table);
        if($deleted){
            return $deleted;
        }else{
            die(__METHOD__.':'.$this->app_db->getLastError());
        }
    }

    // Helpers
    public function pluck($array,$key = null,$value){
        $data = [];
        foreach( $array as $index => $v ){
            if( $key !== null ){
                $data[$v[$key]] = $v[$value]; 
            }else{
                $data[$v[$value]] = $v[$value]; 
            }
        }
        return $data;
    }
    public function pluckOptions($array,$key = null,$value,$selected = ''){
        $data = [];
        foreach( $array as $index => $v ){
            $data[] = [
                'key' => $key ? $v[$key] : $index,
                'value' => $v[$value],
                'selected' => $selected == $v[$key] ? 'selected' : ''
            ];
        }
        return $data;
    }

}