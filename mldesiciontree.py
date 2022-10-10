#Decision Tree Classifier
import numpy as np
import matplotlib.pyplot as plt
import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.tree import DecisionTreeClassifier
from sklearn import tree

df = pd.read_csv("iris.csv")
df.info()
print(df.head(60))
print(df.describe())
print('data loaded')
X = df[['sepal_length','sepal_width','petal_length','petal_width']]
Y = df[['variety']]

x_train,x_test,y_train,y_test = train_test_split(X,Y,test_size=0.33,random_state = 42)
trclf = DecisionTreeClassifier()
trclf.fit(x_train,y_train)
dataClass = trclf.predict(x_test)
print('the score.....')
print(trclf.score(x_test,y_test))
tree.plot_tree(trclf)
plt.show()
