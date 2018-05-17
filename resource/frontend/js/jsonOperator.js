function tree_sub(data,pidval,pidname,idname,subname,skipkey){
    var res={};
    pidval  =   pidval  || 0;
    idname  =   idname  ||'id';
    pidname =   pidname ||'pid';
    subname =   subname ||'sub';

    $.each(data,function(k,v){
        if(skipkey.indexOf(k)==-1){
            if(typeof v=='object' && typeof v[pidname]!='undefined' && typeof v[idname]!='undefined'){
                if(v[pidname]==pidval){
                    skipkey.push(k);
                    var sub=tree_sub(data,v[idname],pidname,idname,subname,skipkey);
                    if(jsonlength(sub)>0){
                        v[subname] = sub;
                    }
                    res[k]=v;

                }
            }
        }

    });
    return res;
}

function jsonlength(jsondata){
    var len=0;
    if(typeof jsondata == "object"){
        for(var key in jsondata){ len++; }
    }
    return len;
}