def_msg = "default message"

def special_print(msg):
    length = len(msg)
    while length >= 0:
        print(msg)
        length = length - 1

if __name__ == "__main__":
    msg = input("[+] Enter nessage to print : ")
    if msg == "":
        special_print(def_msg)
    else:
        special_print(msg)

    print("""
[+] Done printing.
[+] Exiting the program...
    """)
    exit(0)
