from tkinter import *
root = Tk()
root.geometry("425x280")
root.resizable(0,0)
root.title("My Calculator")
root.configure(bg="black")

a = StringVar()
def show(c):
    a.set(a.get()+c)

def equ():
    ex = a.get()
    a.set(eval(ex))

def clr():
    a.set("")

e1 = Entry(root,font="Arial 30 normal",justify="right",textvariable=a)
e1.place(x=0,y=0,width=425,height=50)

b1 = Button(root,font="Arial 25",bg="gray",fg="white",text="7",activebackground="green",activeforeground="blue")
b1.place(x=5,y=55,width=100,height=50)
b1.configure(command = lambda :show("7"))

b2 = Button(root,font="Arial 25",bg="gray",fg="white",text="8",activebackground="green",activeforeground="blue")
b2.place(x=110,y=55,width=100,height=50)
b2.configure(command = lambda :show("8"))

b3 = Button(root,font="Arial 25",bg="gray",fg="white",text="9",activebackground="green",activeforeground="blue")
b3.place(x=215,y=55,width=100,height=50)
b3.configure(command = lambda :show("9"))

b4 = Button(root,font="Arial 25",bg="gray",fg="white",text="+",activebackground="green",activeforeground="blue")
b4.place(x=320,y=55,width=100,height=50)
b4.configure(command = lambda :show("+"))
# -------

b5 = Button(root,font="Arial 25",bg="gray",fg="white",text="4",activebackground="green",activeforeground="blue")
b5.place(x=5,y=110,width=100,height=50)
b5.configure(command = lambda :show("4"))

b6 = Button(root,font="Arial 25",bg="gray",fg="white",text="5",activebackground="green",activeforeground="blue")
b6.place(x=110,y=110,width=100,height=50)
b6.configure(command = lambda :show("5"))

b7 = Button(root,font="Arial 25",bg="gray",fg="white",text="6",activebackground="green",activeforeground="blue")
b7.place(x=215,y=110,width=100,height=50)
b7.configure(command = lambda :show("6"))

b8 = Button(root,font="Arial 25",bg="gray",fg="white",text="-",activebackground="green",activeforeground="blue")
b8.place(x=320,y=110,width=100,height=50)
b8.configure(command = lambda :show("-"))
# ------------
b9 = Button(root,font="Arial 25",bg="gray",fg="white",text="1",activebackground="green",activeforeground="blue")
b9.place(x=5,y=165,width=100,height=50)
b9.configure(command = lambda :show("1"))

b10 = Button(root,font="Arial 25",bg="gray",fg="white",text="2",activebackground="green",activeforeground="blue")
b10.place(x=110,y=165,width=100,height=50)
b10.configure(command = lambda :show("2"))

b11 = Button(root,font="Arial 25",bg="gray",fg="white",text="3",activebackground="green",activeforeground="blue")
b11.place(x=215,y=165,width=100,height=50)
b11.configure(command = lambda :show("3"))

b12 = Button(root,font="Arial 25",bg="gray",fg="white",text="*",activebackground="green",activeforeground="blue")
b12.place(x=320,y=165,width=100,height=50)
b12.configure(command = lambda :show("*"))
# ------------
b13 = Button(root,font="Arial 25",bg="gray",fg="white",text="C",activebackground="green",activeforeground="blue")
b13.place(x=5,y=220,width=100,height=50)
b13.configure(command = clr)

b14 = Button(root,font="Arial 25",bg="gray",fg="white",text="0",activebackground="green",activeforeground="blue")
b14.place(x=110,y=220,width=100,height=50)
b14.configure(command = lambda :show("0"))

b15 = Button(root,font="Arial 25",bg="gray",fg="white",text="%",activebackground="green",activeforeground="blue")
b15.place(x=215,y=220,width=100,height=50)
b15.configure(command = lambda :show("%"))

b16 = Button(root,font="Arial 25",bg="gray",fg="white",text="=",activebackground="green",activeforeground="blue")
b16.place(x=320,y=220,width=100,height=50)
b16.configure(command = equ)
# --------------------
root.mainloop()