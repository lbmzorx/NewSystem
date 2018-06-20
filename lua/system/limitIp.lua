function get_client_ip()
    local headers=ngx.req.get_headers()
    local ip=headers["X-REAL-IP"] or headers["X_FORWARDED_FOR"] or ngx.var.remote_addr or "0.0.0.0"
    return ip
end

function writefile(path, content, mode)
      mode = mode or "w+b"
      local file = io.open(path, mode)
      if file then
        if file:write(content) == nil then return false end
        io.close(file)
        return true
      else
        return false
      end
end

local filepath=ngx.var.luapath.."/system/iplog.log"
local ip = get_client_ip()

--ngx.say("hello world!")

writefile(filepath,ip.."\n","a")
ngx.exit(403)