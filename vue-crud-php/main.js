function ntoString(n){

    times = ~~n/26
    string =""
    for(i=1; i<times-1;i=i++){
    
    m=n
    times = ~~n/26
    this.string +=String.fromCharCode(96+m)
    if(n>26){
        for(i=0;i<m;i++){
            m = m-26*times
            }
        }
    }
    this.string +=String.fromCharCode(96+ (n/times))
return string
}