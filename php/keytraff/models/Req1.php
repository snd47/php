<?php

class Req1 extends Model
{
    public function getList() {
        $sql = "select re.id, of.name, re.price, re.count, op.name as operator from keytraff_test_work.requests re
        left join keytraff_test_work.offers of
            on re.offer_id=of.id
        left join keytraff_test_work.operators op 
            on re.operator_id=op.id
        where re.count>2 and (op.id=10 || op.id=12)";
       
        return $this->db->query($sql);
    }


    
}