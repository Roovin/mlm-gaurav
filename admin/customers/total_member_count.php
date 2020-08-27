<?php
$active_member = 0;
$non_active_member = 0;
$total_member = 0;
$sql="SELECT customer_id, is_member_active FROM customers WHERE sponser_id='$admin'";
$result=mysqli_query($conn, $sql);
$data=mysqli_fetch_all($result, MYSQLI_ASSOC);
foreach($data as $key){
    $member = $key['is_member_active'];
    if($member == 1)
    {
        $active_member += 1;
        // echo $active_member;
    }
    else
    {
        $non_active_member += 1;
    }
    //$total_member += $active_member;
    $customer_id = $key['customer_id'];
    $sql="SELECT customer_id, is_member_active FROM customers WHERE sponser_id='$customer_id'";
    $result=mysqli_query($conn, $sql);
    $data=mysqli_fetch_all($result, MYSQLI_ASSOC);
    // $total_member += count($data);
    foreach($data as $key){
        $member = $key['is_member_active'];
        if($member == 1){
            $active_member += 1;
            // echo $active_member;
        }
        else{
            $non_active_member += 1;
        }
        // $total_member += $active_member;
        $customer_id = $key['customer_id'];
        $sql="SELECT customer_id, is_member_active FROM customers WHERE sponser_id='$customer_id'";
        $result=mysqli_query($conn, $sql);
        $data=mysqli_fetch_all($result, MYSQLI_ASSOC);
        // $total_member += count($data);
        foreach($data as $key){
            $member = $key['is_member_active'];
            if($member == 1){
                $active_member += 1;
            }
            else{
                $non_active_member += 1;
            }
            // $total_member += $active_member;
            $customer_id = $key['customer_id'];
            $sql="SELECT customer_id, is_member_active FROM customers WHERE sponser_id='$customer_id'";
            $result=mysqli_query($conn, $sql);
            $data=mysqli_fetch_all($result, MYSQLI_ASSOC);
            // $total_member += count($data);
            foreach($data as $key){
                $member = $key['is_member_active'];
                if($member == 1){
                    $active_member += 1;
                }
                else{
                    $non_active_member += 1;
                }
                // $total_member += $active_member;
                $customer_id = $key['customer_id'];
                $sql="SELECT customer_id, is_member_active FROM customers WHERE sponser_id='$customer_id'";
                $result=mysqli_query($conn, $sql);
                $data=mysqli_fetch_all($result, MYSQLI_ASSOC);
                // $total_member += count($data);
                foreach($data as $key){
                    $member = $key['is_member_active'];
                    if($member == 1){
                        $active_member += 1;
                    }
                    else{
                        $non_active_member += 1;
                    }
                    // $total_member += $active_member;
                    $customer_id = $key['customer_id'];
                    $sql="SELECT customer_id, is_member_active FROM customers WHERE sponser_id='$customer_id'";
                    $result=mysqli_query($conn, $sql);
                    $data=mysqli_fetch_all($result, MYSQLI_ASSOC);
                    // $total_member += count($data);
                    foreach($data as $key){
                        $member = $key['is_member_active'];
                        if($member == 1){
                            $active_member += 1;
                        }
                        else{
                            $non_active_member += 1;
                        }
                        // $total_member += $active_member;
                        $customer_id = $key['customer_id'];
                        $sql="SELECT customer_id, is_member_active FROM customers WHERE sponser_id='$customer_id'";
                        $result=mysqli_query($conn, $sql);
                        $data=mysqli_fetch_all($result, MYSQLI_ASSOC);
                        // $total_member += count($data);
                        foreach($data as $key){
                            $member = $key['is_member_active'];
                            if($member == 1){
                                $active_member += 1;
                            }
                            else{
                                $non_active_member += 1;
                            }
                            // $total_member += $active_member;
                            $customer_id = $key['customer_id'];
                            $sql="SELECT customer_id, is_member_active FROM customers WHERE sponser_id='$customer_id'";
                            $result=mysqli_query($conn, $sql);
                            $data=mysqli_fetch_all($result, MYSQLI_ASSOC);
                            // $total_member += count($data);
                            foreach($data as $key){
                                $member = $key['is_member_active'];
                                if($member == 1){
                                    $active_member += 1;
                                }
                                else{
                                    $non_active_member += 1;
                                }
                                // $total_member += $active_member;
                                $customer_id = $key['customer_id'];
                                $sql="SELECT customer_id, is_member_active FROM customers WHERE sponser_id='$customer_id'";
                                $result=mysqli_query($conn, $sql);
                                $data=mysqli_fetch_all($result, MYSQLI_ASSOC);
                                // $total_member += count($data);
                                foreach($data as $key){
                                    $member = $key['is_member_active'];
                                    if($member == 1){
                                        $active_member += 1;
                                    }
                                    else{
                                        $non_active_member += 1;
                                    }
                                    // $total_member += $active_member;
                                    $customer_id = $key['customer_id'];
                                    $sql="SELECT customer_id, is_member_active FROM customers WHERE sponser_id='$customer_id'";
                                    $result=mysqli_query($conn, $sql);
                                    $data=mysqli_fetch_all($result, MYSQLI_ASSOC);
                                    // $total_member += count($data);
                                    foreach($data as $key){
                                        $member = $key['is_member_active'];
                                        if($member == 1){
                                            $active_member += 1;
                                        }
                                        else{
                                            $non_active_member += 1;
                                        }
                                        // $total_member += $active_member;
                                        $customer_id = $key['customer_id'];
                                        $sql="SELECT customer_id, is_member_active FROM customers WHERE sponser_id='$customer_id'";
                                        $result=mysqli_query($conn, $sql);
                                        $data=mysqli_fetch_all($result, MYSQLI_ASSOC);
                                        // $total_member += count($data);
                                        foreach($data as $key){
                                            $member = $key['is_member_active'];
                                            if($member == 1){
                                                $active_member += 1;
                                            }
                                            else{
                                                $non_active_member += 1;
                                            }
                                            // $total_member += $active_member;
                                            $customer_id = $key['customer_id'];
                                            $sql="SELECT customer_id, is_member_active FROM customers WHERE sponser_id='$customer_id'";
                                            $result=mysqli_query($conn, $sql);
                                            $data=mysqli_fetch_all($result, MYSQLI_ASSOC);
                                            // $total_member += count($data);
                                            foreach($data as $key){
                                                $member = $key['is_member_active'];
                                                if($member == 1){
                                                    $active_member += 1;
                                                }
                                                else{
                                                    $non_active_member += 1;
                                                }
                                                // $total_member += $active_member;
                                                $customer_id = $key['customer_id'];
                                                $sql="SELECT customer_id, is_member_active FROM customers WHERE sponser_id='$customer_id'";
                                                $result=mysqli_query($conn, $sql);
                                                $data=mysqli_fetch_all($result, MYSQLI_ASSOC);
                                                // $total_member += count($data);
                                                foreach($data as $key){
                                                    $member = $key['is_member_active'];
                                                    if($member == 1){
                                                        $active_member += 1;
                                                    }
                                                    else{
                                                        $non_active_member += 1;
                                                    }
                                                    // $total_member += $active_member;
                                                    $customer_id = $key['customer_id'];
                                                    $sql="SELECT customer_id, is_member_active FROM customers WHERE sponser_id='$customer_id'";
                                                    $result=mysqli_query($conn, $sql);
                                                    $data=mysqli_fetch_all($result, MYSQLI_ASSOC);
                                                    // $total_member += count($data);
                                                    foreach($data as $key){
                                                        $member = $key['is_member_active'];
                                                        if($member == 1){
                                                            $active_member += 1;
                                                        }
                                                        else{
                                                            $non_active_member += 1;
                                                        }
                                                        // $total_member += $active_member;
                                                        $customer_id = $key['customer_id'];
                                                        $sql="SELECT customer_id, is_member_active FROM customers WHERE sponser_id='$customer_id'";
                                                        $result=mysqli_query($conn, $sql);
                                                        $data=mysqli_fetch_all($result, MYSQLI_ASSOC);
                                                        // $total_member += count($data);
                                                        foreach($data as $key){
                                                            $member = $key['is_member_active'];
                                                            if($member == 1){
                                                                $active_member += 1;
                                                            }
                                                            else{
                                                                $non_active_member += 1;
                                                            }
                                                            // $total_member += $active_member;
                                                            $customer_id = $key['customer_id'];
                                                            $sql="SELECT customer_id, is_member_active FROM customers WHERE sponser_id='$customer_id'";
                                                            $result=mysqli_query($conn, $sql);
                                                            $data=mysqli_fetch_all($result, MYSQLI_ASSOC);
                                                            // $total_member += count($data);
                                                            foreach($data as $key){
                                                                $member = $key['is_member_active'];
                                                                if($member == 1){
                                                                    $active_member += 1;
                                                                }
                                                                else{
                                                                    $non_active_member += 1;
                                                                }
                                                                // $total_member += $active_member;
                                                                $customer_id = $key['customer_id'];
                                                                $sql="SELECT customer_id, is_member_active FROM customers WHERE sponser_id='$customer_id'";
                                                                $result=mysqli_query($conn, $sql);
                                                                $data=mysqli_fetch_all($result, MYSQLI_ASSOC);
                                                                // $total_member += count($data);
                                                                foreach($data as $key){
                                                                    $member = $key['is_member_active'];
                                                                    if($member == 1){
                                                                        $active_member += 1;
                                                                    }
                                                                    else{
                                                                        $non_active_member += 1;
                                                                    }
                                                                    // $total_member += $active_member;
                                                                    $customer_id = $key['customer_id'];
                                                                    $sql="SELECT customer_id, is_member_active FROM customers WHERE sponser_id='$customer_id'";
                                                                    $result=mysqli_query($conn, $sql);
                                                                    $data=mysqli_fetch_all($result, MYSQLI_ASSOC);
                                                                    // $total_member += count($data);
                                                                    foreach($data as $key){
                                                                        $member = $key['is_member_active'];
                                                                        if($member == 1){
                                                                            $active_member += 1;
                                                                        }
                                                                        else{
                                                                            $non_active_member += 1;
                                                                        }
                                                                        // $total_member += $active_member;
                                                                        $customer_id = $key['customer_id'];
                                                                        $sql="SELECT customer_id, is_member_active FROM customers WHERE sponser_id='$customer_id'";
                                                                        $result=mysqli_query($conn, $sql);
                                                                        $data=mysqli_fetch_all($result, MYSQLI_ASSOC);
                                                                        // $total_member += count($data);
                                                                        foreach($data as $key){
                                                                            $member = $key['is_member_active'];
                                                                            if($member == 1){
                                                                                $active_member += 1;
                                                                            }
                                                                            else{
                                                                                $non_active_member += 1;
                                                                            }
                                                                            // $total_member += $active_member;
                                                                            $customer_id = $key['customer_id'];
                                                                            $sql="SELECT customer_id, is_member_active FROM customers WHERE sponser_id='$customer_id'";
                                                                            $result=mysqli_query($conn, $sql);
                                                                            $data=mysqli_fetch_all($result, MYSQLI_ASSOC);
                                                                            // $total_member += count($data);
                                                                            foreach($data as $key){
                                                                                $member = $key['is_member_active'];
                                                                                if($member == 1){
                                                                                    $active_member += 1;
                                                                                }
                                                                                else{
                                                                                    $non_active_member += 1;
                                                                                }
                                                                                // $total_member += $active_member;
                                                                                $customer_id = $key['customer_id'];
                                                                                $sql="SELECT customer_id, is_member_active FROM customers WHERE sponser_id='$customer_id'";
                                                                                $result=mysqli_query($conn, $sql);
                                                                                $data=mysqli_fetch_all($result, MYSQLI_ASSOC);
                                                                                // $total_member += count($data);
                                                                                foreach($data as $key){
                                                                                    $member = $key['is_member_active'];
                                                                                    if($member == 1){
                                                                                        $active_member += 1;
                                                                                    }
                                                                                    else{
                                                                                        $non_active_member += 1;
                                                                                    }
                                                                                    // $total_member += $active_member;
                                                                                    $customer_id = $key['customer_id'];
                                                                                    $sql="SELECT customer_id, is_member_active FROM customers WHERE sponser_id='$customer_id'";
                                                                                    $result=mysqli_query($conn, $sql);
                                                                                    $data=mysqli_fetch_all($result, MYSQLI_ASSOC);
                                                                                    // $total_member += count($data);
                                                                                    foreach($data as $key){
                                                                                        $member = $key['is_member_active'];
                                                                                        if($member == 1){
                                                                                            $active_member += 1;
                                                                                        }
                                                                                        else{
                                                                                            $non_active_member += 1;
                                                                                        }
                                                                                        // $total_member += $active_member;
                                                                                        $customer_id = $key['customer_id'];
                                                                                        $sql="SELECT customer_id, is_member_active FROM customers WHERE sponser_id='$customer_id'";
                                                                                        $result=mysqli_query($conn, $sql);
                                                                                        $data=mysqli_fetch_all($result, MYSQLI_ASSOC);
                                                                                        // $total_member += count($data);
                                                                                        foreach($data as $key){
                                                                                            $member = $key['is_member_active'];
                                                                                            if($member == 1){
                                                                                                $active_member += 1;
                                                                                            }
                                                                                            else{
                                                                                                $non_active_member += 1;
                                                                                            }
                                                                                            // $total_member += $active_member;
                                                                                            $customer_id = $key['customer_id'];
                                                                                            $sql="SELECT customer_id, is_member_active FROM customers WHERE sponser_id='$customer_id'";
                                                                                            $result=mysqli_query($conn, $sql);
                                                                                            $data=mysqli_fetch_all($result, MYSQLI_ASSOC);
                                                                                            // $total_member += count($data);
                                                                                            foreach($data as $key){
                                                                                                $member = $key['is_member_active'];
                                                                                                if($member == 1){
                                                                                                    $active_member += 1;
                                                                                                }
                                                                                                else{
                                                                                                    $non_active_member += 1;
                                                                                                }
                                                                                                // $total_member += $active_member;
                                                                                                $customer_id = $key['customer_id'];
                                                                                                $sql="SELECT customer_id, is_member_active FROM customers WHERE sponser_id='$customer_id'";
                                                                                                $result=mysqli_query($conn, $sql);
                                                                                                $data=mysqli_fetch_all($result, MYSQLI_ASSOC);
                                                                                                // $total_member += count($data);
                                                                                                foreach($data as $key){
                                                                                                    $member = $key['is_member_active'];
                                                                                                    if($member == 1){
                                                                                                        $active_member += 1;
                                                                                                    }
                                                                                                    else{
                                                                                                        $non_active_member += 1;
                                                                                                    }
                                                                                                    // $total_member += $active_member;
                                                                                                    $customer_id = $key['customer_id'];
                                                                                                    $sql="SELECT customer_id, is_member_active FROM customers WHERE sponser_id='$customer_id'";
                                                                                                    $result=mysqli_query($conn, $sql);
                                                                                                    $data=mysqli_fetch_all($result, MYSQLI_ASSOC);
                                                                                                    // $total_member += count($data);
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
$total_member += $active_member
?>