import json
try:
    going = True
    multy_values = False
    while going:
        tos = input("Enter the type you want to insert(video,channel,playlist,book): ")
        lang = input("Enter to which language to insert (could be a list sapereted by a ','):")
        if tos == "exit":
            break
        langs = lang.split(',')
        for lng in langs:
            path = f"/var/www/html/WebProject/resources/{lng}/" 
            if tos == "video":
                with open(path+"youtube.json","r") as json_input:
                    if not multy_values:
                        try:
                            vid_id = input("Enter the video id: ")
                            title = input("Enter the video title: ")
                        except NameError:
                            vid_id = input("Enter the video id: ")
                            title = input("Enter the video title: ")
                    jsn = json.load(json_input)
                    jsn.append({
                                "video_id":f"{vid_id}",
                                "title":f"{title}"})
                with open(path+"youtube.json","w") as json_output:
                    json.dump(jsn,json_output,indent=4, sort_keys=True)
            elif tos == "channel":
                with open(path+"channels.json","r") as json_input:
                    if not multy_values:
                        try:
                            channel_link = input("Enter the channel link: ")
                            name = input("Enter the channel name: ")
                        except NameError:
                            channel_link = input("Enter the channel link: ")
                            name = input("Enter the channel name: ")
                    jsn = json.load(json_input)
                    jsn.append({
                                "link":f"{channel_link}",
                                "name":f"{name}",
                                "image":f"{name.replace(' ','')}.jpg"
                                })
                with open(path+"channels.json","w") as json_output:
                    json.dump(jsn,json_output,indent=4, sort_keys=True)
            elif tos == "playlist":
                with open(path+"playlists.json","r") as json_input:
                    if not multy_values:
                        try:
                            playlist_link = input("Enter the playlist link: ")
                            name = input("Enter the playlist name: ")
                            vid_id = input("Enter the first video id: ")
                        except NameError:
                            playlist_link = input("Enter the playlist link: ")
                            name = input("Enter the playlist name: ")
                            vid_id = input("Enter the first video id: ")
                    jsn = json.load(json_input)
                    jsn.append({
                                "link":f"{playlist_link}",
                                "name":f"{name}",
                                "image":f"{name.replace(' ','')}.jpg",
                                "video_id":f"{vid_id}"
                                })
                with open(path+"playlists.json","w") as json_output:
                    json.dump(jsn,json_output,indent=4, sort_keys=True)
            if len(langs) > 1:
                multy_values = True
except KeyboardInterrupt:
    print('\n\n')
    print(50*'=')
    print('\n')
    print("\nExiting the program")
    print('\n')
    print(50*'=')
    print('\n\n')
    exit(0)