##########################################################################
#File Name:systemmonitor.sh
#Author:Yuolvv
#Blog:http://blog.iyu.pub
##########################################################################

#!/bin/bash
#把屏幕上的内容清空
clear
if [[ $# -eq 0 ]]
then

echo -e '\E[33m'"#########################系统分析#########################"

#定义一个高亮输出的变量
output=$(tput sgr0)

#检查系统类型，使用uname -o命令
os=$(uname -o)
echo -e '\E[32m'"系统类型:"$output $os

#获取操作系统版本类型
#os_name=$(cat /etc/issue | grep -e "Server")
#os_name=$(lsb_release -a | grep -e "Description")
os_name=$(cat /etc/redhat-release)
echo -e '\E[33m'"系统版本:"$output $os_name

#获取CPU的指令集
os_bit=$(uname -m)
echo -e '\E[34m'"系统位数:"$output $os_bit

#获取内核版本
os_kernel=$(uname -r)
echo -e '\E[35m'"内核版本:"$output $os_kernel

#获取主机名￥hostname或者uname -n
hostname=$(hostname)
#获取内网IP
inner=$(hostname -I)
echo -e '\E[36m'"内网IP:"$output $inner

#获取外网IP
outer=$(curl -s http://ipecho.net/plain)
echo -e '\E[29m'"外网IP:"$output $outer

#获取DNS，从/etc/resolv.conf文件提取匹配
nameservers=$(cat /etc/resolv.conf | grep -E "\<nameserver[ ]"+|awk '{print $NF}')
echo -e '\E[31m'"系统DNS:"$output $nameservers

#判断当前网络的连通性，直接使用ping命令测试
ping -c 2 www.ifeng.com &>/dev/null && echo "网络连通:yes"||echo "网络连通:no"

#检查当前登录的用户，使用who命令输出到一个临时文件中
who >/tmp/who
echo -e '\E[32m'"当前登录用户:"$output && cat /tmp/who

#命令输出后删除临时文件
rm -rf /tmp/who

echo -e '\E[33m'"##########################################################"


echo -e '\E[33m'"#########################运行状态#########################"

#获取系统已经使用的内存，通过awk命令文本进行提取，然后计算出结果转换成MB
system_men=$(awk '/MemTotal/{total=$2}/MemFree/{free=$2}END{print (total-free)/1024}' /proc/meminfo)
echo -e '\E[36m'"系统使用内存:"$output $system_men"M"

#获取应用使用内存，通过awk命令文本进行提取，然后计算出结果换算成MB
app_men=$(awk '/MemTotal/{total=$2}/MemFree/{free=$2}/Cached/{cached=$2}/Buffers/{buffers=$2}END{print (total-free-cached-buffers)/1024}' /proc/meminfo)
echo -e '\E[36m'"应用程序使用内存:"$output $app_men"M"

#获取系统CPU负载
load_average=$(top -n 1 -b | grep "load average:" | awk '{print $12 $13 $14}')
echo -e '\E[33m'"CPU负载:"$output $load_average

#获取磁盘状况
disk=$(df -hP | grep -vE 'Filesystem|tmpfs'|awk '{print $1 "总量:"$2 "已使用:"$3 "使用率:"$5}')
echo -e '\E[33m'"磁盘状况:"$output $disk

echo -e '\E[33m'"##########################################################"

else

echo "shell脚本不能运行请联系我Email:1@iyu.pub"

fi


